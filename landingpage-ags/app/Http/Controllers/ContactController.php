<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        $ticketNumber = 'Ticket-' . strtoupper(substr(uniqid(), -6));

        $messageBody = "Nama: {$request->name}\n";
        $messageBody .= "Email: {$request->email}\n";
        $messageBody .= "Tiket:{$ticketNumber}\n";
        $messageBody .= "Pesan:\n{$request->message}";

        $SubjectByTicket = "{$request->subject} $ticketNumber";
        
        try {
            Mail::raw($messageBody, function ($mail) use ($request , $SubjectByTicket) {
                $mail->from('cs@adidataglobalsistem.site', $request->name);
                $mail->to('cs@adidataglobalsistem.site');
                $mail->subject($SubjectByTicket);
            });

            // Email ke User (balasan otomatis)
            $userMessage = "Halo {$request->name},\n\n"
            . "Laporan Anda dengan nomor tiket {$ticketNumber} sedang kami proses,\n"
            . "Dan akan kami respon dengan Subject yang di masukkan pada e-form.\n"
            . "Mohon tunggu informasi selanjutnya.\n\n"
            . "Terima kasih sudah menghubungi Customer Service Adidata Global Sistem.\n"
            . "Salam,\n\n\n"
            . "Tim Customer Service Adidata Global Sistem";
        

            Mail::raw($userMessage, function ($mail) use ($request,$ticketNumber) {
                $mail->from('cs@adidataglobalsistem.site', 'Konfirmasi Laporan - noreply');
                $mail->to($request->email);
                $mail->subject("noreply Konfirmasi Laporan tiket {$ticketNumber}");
            });

            return back()->with('success', 'Pesan Anda telah terkirim!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim pesan');
        }
        // try {
        //     Mail::to('cs@adidataglobalsistem.site')->send(new ContactFormMail($data));
        //     return back()->with('success', 'Pesan Anda telah terkirim!');
        // } catch (\Exception $e) {
        //     return back()->with('error', 'Gagal mengirim pesan: '.$e->getMessage());
        // }

        // try {
        //     Mail::to('cs@adidataglobalsistem.site')->send(new ContactFormMail($data));

        //     return response()->json([
        //         'status' => true,
        //         'message' => 'Pesan Anda telah terkirim!',
        //     ]);
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Gagal mengirim pesan',
        //         'error' => $e->getMessage(), // Bisa dikasih ke frontend buat debug
        //     ], 500);
        // }
    }
}
