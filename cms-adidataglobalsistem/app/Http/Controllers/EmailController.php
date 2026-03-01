<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\EmailAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Webklex\IMAP\Facades\Client;

class EmailController extends Controller
{
    public function showComposeForm()
    {
        return view('email.compose');
    }

    public function composeSend(Request $request)
    {
        $request->validate([
            'to_email' => 'required|email',
            'subject'  => 'required|string|max:255',
            'message'  => 'required|string',
            'attachments.*' => 'file|max:10240',
        ]);

        DB::beginTransaction();
        try {
            // Generate Ticket Number Baru (Contoh: TICKET-20260210-XYZ)
            $ticketNumber = 'TICKET-' . date('Ymd') . '-' . strtoupper(uniqid());

            $email = Email::create([
                'ticket_number' => $ticketNumber,
                'from_email'    => 'cs@adidataglobalsistem.site', // Email default CS kamu
                'from_name'     => 'Customer Service',
                'to_email'      => $request->to_email,
                'subject'       => $request->subject,
                'body'          => $request->message,
                'direction'     => 'outgoing',
                'folder'        => 'SENT',
                'status'        => 'read',
                'message_id'    => '<' . uniqid() . '@adidataglobalsistem.site>',
            ]);

            // Handle Attachments
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    EmailAttachment::create([
                        'email_id' => $email->id,
                        'filename' => $file->getClientOriginalName(),
                        'filepath' => $file->store('email-attachments'),
                        'mime_type' => $file->getMimeType(),
                        'size'      => $file->getSize(),
                    ]);
                }
            }

            // Kirim Email Fisik via SMTP
            Mail::html($request->message, function ($m) use ($email, $request) {
                $m->from($email->from_email, $email->from_name)
                  ->to($email->to_email)
                  ->subject($email->subject);

                if ($request->hasFile('attachments')) {
                    foreach ($request->file('attachments') as $file) {
                        $m->attach($file->getRealPath(), [
                            'as' => $file->getClientOriginalName(),
                            'mime' => $file->getMimeType(),
                        ]);
                    }
                }
            });

            $email->raw_body = "Subject: {$email->subject}\r\n" .
                   "From: {$email->from_name} <{$email->from_email}>\r\n" .
                   "To: {$email->to_email}\r\n" .
                   "Date: " . now()->toRfc2822String() . "\r\n" .
                   "Content-Type: text/html; charset=utf-8\r\n\r\n" .
                   $request->message;

            // Sinkronisasi ke folder .Sent di Maildir (Dovecot)
            $this->syncToSentFolder($email);

            DB::commit();
            return redirect()->route('email.index', ['folder' => 'SENT'])->with('success', 'Email berhasil dikirim!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Send Email Error: " . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }

    // Reply
    public function showReplyForm($ticketNumber)
    {
        $emails = Email::where('ticket_number', $ticketNumber)
            ->with('attachments')
            ->orderBy('created_at', 'asc')
            ->get();

        if ($emails->isEmpty()) return redirect()->back()->with('error', 'Ticket not found.');

        Email::where('ticket_number', $ticketNumber)
        ->where('status', 'unread')
        ->update([
            'status' => 'read',
            'read_at' => now(),
            'read_by' => auth()->id()
        ]);

        $lastIncoming = $emails->where('direction', 'incoming')->last();
        if ($lastIncoming && $lastIncoming->status === 'unread') {
            $this->syncImapFlag($lastIncoming, 'Seen', true);
        }

        $senderAddress = $lastIncoming ? $lastIncoming->to_email : 'cs@adidataglobalsistem.site';

        return view('email.reply', compact('ticketNumber', 'emails', 'senderAddress'));
    }

    public function reply(Request $request, $ticketNumber)
    {
        $request->validate([
            'message' => 'required|string',
            'subject' => 'required|string',
            'from_email_reply' => 'required|email',
            'attachments.*' => 'file|max:10240',
        ]);

        DB::beginTransaction();
        try {
            $original = Email::where('ticket_number', $ticketNumber)->latest()->firstOrFail();
            $reply = Email::create([
                'ticket_number' => $ticketNumber,
                'from_email'    => $request->from_email_reply,
                'from_name'     => "Customer Service",
                'to_email'      => $original->from_email,
                'to_name'       => $original->from_name,
                'subject'       => $request->subject,
                'body'          => $request->message,
                'direction'     => 'outgoing',
                'folder'        => 'SENT',
                'status'        => 'read',
                'message_id'    => '<' . uniqid() . '@adidataglobalsistem.site>',
                'in_reply_to'   => $original->message_id,
            ]);

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    EmailAttachment::create([
                        'email_id' => $reply->id,
                        'filename' => $file->getClientOriginalName(),
                        'filepath' => $file->store('email-attachments'),
                        'mime_type' => $file->getMimeType(),
                        'size' => $file->getSize(),
                    ]);
                }
            }

            Mail::html($request->message, function ($m) use ($reply, $original) {
                $m->from($reply->from_email, $reply->from_name)
                  ->to($reply->to_email, $reply->to_name)
                  ->subject($reply->subject);
                if ($original->message_id) {
                    $m->getHeaders()->addTextHeader('In-Reply-To', $original->message_id);
                    $m->getHeaders()->addTextHeader('References', $original->message_id);
                }
            });

            $this->syncToSentFolder($reply);
            $original->update(['status' => 'replied']);
            DB::commit();
            return redirect()->back()->with('success', 'Balasan terkirim!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 25); // Default 25
        $search = $request->input('search', '');
        $sortField = $request->input('sort_field', 'created_at');
        $sortDirection = $request->input('sort_direction', 'desc');
        
        $currentFolder = strtoupper($request->input('folder', 'INBOX'));
        $showFlaggedOnly = $request->boolean('flagged', false);
        $currentLabel = $request->input('label');

        $query = $this->getBaseQuery($currentFolder, $search, $sortField, $sortDirection);

        if ($showFlaggedOnly) {
            $query->where('is_flagged', true);
            $folderTitle = "Starred";
        } elseif ($currentLabel) {
            $query->where('label', $currentLabel);
            $folderTitle = "Label: " . ucfirst($currentLabel);
        } else {
            $folderTitle = ucfirst(strtolower($currentFolder));
        }

        $emails = $query->paginate($perPage)->appends($request->query());
        $availableLabels = Email::whereNotNull('label')->where('label', '!=', '')->distinct()->pluck('label');

        return view('email.index', compact(
            'emails', 'currentFolder', 'folderTitle', 'search', 
            'perPage', 'sortField', 'sortDirection', 'availableLabels', 'currentLabel'
        ));
    }

    /**
     * Update Label untuk Email
     */
    public function updateLabel(Request $request, $id)
    {
        $request->validate([
            'label' => 'required|string|max:50'
        ]);

        try {
            $email = Email::findOrFail($id);
            $email->update(['label' => strtolower($request->label)]);

            return back()->with('success', 'Label updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update label.');
        }
    }

    /**
     * Toggle Bintang (Flagged)
     */
    public function toggleStar($id)
    {
        try {
            $email = Email::findOrFail($id);
            $newStatus = !$email->is_flagged;
            
            $email->update(['is_flagged' => $newStatus]);
            
            // Sinkronkan ke server IMAP (\Flagged)
            // $this->syncImapFlag($email, 'Flagged', $newStatus);
            
            return response()->json([
            'success' => true,
            'is_flagged' => $newStatus
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    protected function getBaseQuery($folder, $search, $sortField, $sortDirection)
    {
        $allowedSortFields = ['created_at', 'subject', 'from_email', 'status', 'is_flagged'];
        $field = in_array($sortField, $allowedSortFields) ? $sortField : 'created_at';
        $direction = strtolower($sortDirection) === 'asc' ? 'asc' : 'desc';

        // Jika user sedang melihat "Starred" atau "Label", kita abaikan filter foldernya 
        // atau tetap pakai filter folder tergantung keinginanmu. 
        // Di sini saya asumsikan folder tetap jadi filter utama.
        $query = Email::where('folder', $folder);

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('subject', 'like', "%$search%")
                  ->orWhere('from_email', 'like', "%$search%")
                  ->orWhere('body', 'like', "%$search%");
            });
        }

        return $query->orderBy($field, $direction);
    }

    public function markAsRead($id)
    {
        try {
            $email = Email::findOrFail($id);
            $email->update([
                'status' => 'read',
                'read_at' => now(),
                'read_by' => auth()->id()
            ]);

            // $this->syncImapFlag($email, 'Seen', true);
            return back()->with('success', 'Email marked as read!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function moveToTrash($id)
    {
        try {
            $email = Email::findOrFail($id);
            $oldFolder = $email->folder;

            // 1. Jika sudah di TRASH, Delete Permanen
            if (strtoupper($oldFolder) === 'TRASH') {
                // Beri flag deleted di server
                // $this->syncImapFlag($email, 'Deleted', true); 
                
                // Hapus record di database
                $email->delete(); 
                
                return back()->with('success', 'Email permanently deleted!');
            }

            // 2. Jika belum di Trash, pindahkan di Server IMAP DULU
            // $moved = $this->moveImapMessage($email, $oldFolder, 'TRASH');

            // if ($moved) {
                // 3. Jika di server berhasil pindah, baru update Database Laravel
                $email->update([
                    'folder' => 'TRASH'
                ]);
                
                return back()->with('success', 'Email moved to trash!');
            // } else {
                // return back()->with('error', 'Gagal memindahkan email di server Maildir.');
            // }

        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function restoreFromTrash($id)
    {
        try {
            $email = Email::findOrFail($id);

            // Pastikan email memang ada di folder TRASH
            if (strtoupper($email->folder) !== 'TRASH') {
                return back()->with('error', 'Email is not in Trash.');
            }

            // 1. Pindahkan di server IMAP dulu (dari Trash balik ke INBOX)
            // $moved = $this->moveImapMessage($email, 'TRASH', 'INBOX');

            // if ($moved) {
                // 2. Jika di server berhasil, update database Laravel
                $email->update([
                    'folder' => 'INBOX'
                ]);

                return back()->with('success', 'Email restored to Inbox!');
            // } else {
                // Fallback: Jika gagal di server, tetap kasih pilihan paksa update DB atau error
                // return back()->with('error', 'Gagal restore di server Maildir.');
            // }

        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function restoreAllFromTrash() 
    {
        try {
            $data = Email::where('folder', 'TRASH');
            
            if ($data->count() === 0) {
                return back()->with('info', 'Trash is already empty.');
            }

            $data->update([
                'folder' => 'INBOX'
            ]);

            return back()->with('success', 'All emails restored to Inbox successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function emptyTrash()
    {
        try {
            // 1. Ambil semua email yang ada di folder TRASH
            $emails = Email::where('folder', 'TRASH')->get();

            if ($emails->isEmpty()) {
                return back()->with('info', 'Trash is already empty.');
            }

            foreach ($emails as $email) {
                // 2. Hapus di server IMAP (Maildir) dulu
                // $deletedAtServer = $this->deleteImapMessage($email, 'TRASH');

                // if ($deletedAtServer) {
                    // 3. Kalau di server oke, hapus di database
                    $email->delete();
                // }
            }

            return back()->with('success', 'Trash folder cleared permanently from server and database!');

        } catch (\Exception $e) {
            return back()->with('error', 'Failed to empty trash: ' . $e->getMessage());
        }
    }

    public function bulkAction(Request $request)
    {
        $ids = $request->input('selected_emails', []);
        $action = $request->input('action');
        $currentFolder = strtoupper($request->input('current_folder', 'INBOX'));

        if (empty($ids)) return back()->with('error', 'No emails selected.');

        try {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $email = Email::findOrFail($id);
                switch ($action) {
                    case 'read':
                        $email->update(['status' => 'read', 'read_at' => now()]);
                        // $this->syncImapFlag($email, 'Seen', true);
                        break;
                    case 'trash':
                        if ($currentFolder === 'TRASH') {
                            $email->delete(); // Delete Permanen jika di folder Trash
                        } else {
                            $oldFolder = $email->folder;
                            $email->update(['folder' => 'TRASH']);
                            // $this->moveImapMessage($email, $oldFolder, 'Trash');
                        }
                        break;
                    case 'restore':
                        if ($currentFolder === 'TRASH') {
                            $email->update(['folder' => 'INBOX']);
                            // $this->moveImapMessage($email, 'TRASH', 'INBOX');
                        }
                        break;
                    // case 'set_label':
                    //     $label = $request->input('label_name');
                    //     $email->update(['label' => strtolower($label)]);
                        // break;
                }
            }
            DB::commit();
            return back()->with('success', 'Bulk action completed!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed: ' . $e->getMessage());
        }
    }

   // --- IMAP SYNC HELPERS ---
    // private function deleteImapMessage($email, $folderName)
    // {
    //     // Logic ini harus mirip sama moveImapMessage lu
    //     try {
    //         // Contoh logic sederhana:
    //         // return $this->imapHelper->permanentDelete($email->uid, $folderName);
    //         return true; // Return true jika berhasil
    //     } catch (\Exception $e) {
    //         return false;
    //     }
    // }

    // protected function moveImapMessage($emailModel, $fromFolder, $toFolder)
    // {
    //     try {
    //         $client = \Webklex\IMAP\Facades\Client::account('default');
    //         $client->connect();

    //         // 1. Tentukan folder asal & tujuan secara akurat
    //         $fromName = $this->resolveFolderName($client, $fromFolder);
    //         $toName = $this->resolveFolderName($client, $toFolder);

    //         $folderSource = $client->getFolder($fromName);

    //         // 2. Cari email di server berdasarkan Message-ID
    //         $query = $folderSource->query();
    //         if ($emailModel->message_id) {
    //             $query->whereMessageId($emailModel->message_id);
    //         }
            
    //         $message = $query->get()->first();

    //         if ($message) {
    //             // 3. Pindahkan di server (Dovecot akan geser file fisik ke .Trash/cur/)
    //             $message->move($toName);
    //             return true;
    //         }
    //         return false;
    //     } catch (\Exception $e) {
    //         \Illuminate\Support\Facades\Log::error("IMAP Move Error: " . $e->getMessage());
    //         return false;
    //     }
    // }

    // protected function syncImapFlag($emailModel, $flag, $set = true)
    // {
    //     try {
    //         $client = \Webklex\IMAP\Facades\Client::account('default');
    //         $client->connect();

    //         $folderName = $this->resolveFolderName($client, $emailModel->folder);
    //         $folder = $client->getFolder($folderName);
            
    //         $message = $folder->query()->whereMessageId($emailModel->message_id)->get()->first();

    //         if ($message) {
    //             if ($set) {
    //                 $message->setFlag($flag);
    //             } else {
    //                 $message->unsetFlag($flag);
    //             }
    //         }
    //     } catch (\Exception $e) {
    //         \Illuminate\Support\Facades\Log::error("IMAP Flag Error: " . $e->getMessage());
    //     }
    // }

    // protected function syncToSentFolder($emailModel)
    // {
    //     try {
    //         $client = \Webklex\IMAP\Facades\Client::account('default');
    //         $client->connect();

    //         $sentFolder = $this->resolveFolderName($client, 'SENT');
            
    //         // Mengambil konten mentah email untuk disimpan ke folder Sent server
    //         // Ini agar email yang dikirim dari Laravel muncul di folder 'Sent' Maildir
    //         $client->getFolder($sentFolder)->appendMessage($emailModel->raw_body);
            
    //     } catch (\Exception $e) {
    //         \Illuminate\Support\Facades\Log::error("IMAP Sent Sync Error: " . $e->getMessage());
    //     }
    // }

    // protected function resolveFolderName($client, $name)
    // {
    //     $name = strtoupper($name);
        
    //     // Mapping ini krusial untuk Dovecot Maildir (pakai titik di depan atau INBOX. di depan)
    //     $map = [
    //         'TRASH' => ['INBOX.Trash', 'Trash', '.Trash', 'INBOX.Bin'],
    //         'SENT'  => ['INBOX.Sent', 'Sent', '.Sent', 'Sent Messages'],
    //         'INBOX' => ['INBOX']
    //     ];

    //     $options = $map[$name] ?? [$name];

    //     foreach ($options as $opt) {
    //         try {
    //             $folder = $client->getFolder($opt);
    //             if ($folder) return $opt;
    //         } catch (\Exception $e) {
    //             continue;
    //         }
    //     }

    //     return 'INBOX';
    // }
}