<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email;
use App\Events\NewEmailReceived;
use Illuminate\Support\Facades\Log;

class EmailWebhookController extends Controller
{
    public function receive(Request $request) 
    {
        $raw = $request->input('raw_body');

        // 1. Filter MAILER-DAEMON (Email Sistem/Bounce)
        // Kita cek baris Envelope (tanpa titik dua) dan Header (dengan titik dua)
        if (
            stripos($raw, 'From MAILER-DAEMON') !== false || 
            stripos($raw, 'From: MAILER-DAEMON') !== false || 
            stripos($raw, 'Return-Path: <>') !== false ||
            stripos($raw, 'Return-Path: <MAILER-DAEMON>') !== false
        ) {
            Log::info('Ignored System Email (MAILER-DAEMON)'); 
            return response()->json(['status' => 'ignored_system_mail']);
        }

        Log::info('Webhook Email Masuk!', ['data' => substr($raw, 0, 100)]);

        // 2. Ekstrak Header menggunakan Regex yang lebih aman
        
        // Ambil From: "Nama" <email@palsu.com> -> kita mau emailnya saja
        if (preg_match('/From:.*<(.+?)>/i', $raw, $mFromEmail)) {
            $from = $mFromEmail[1];
        } else {
            preg_match('/From: (.*)/i', $raw, $mFrom);
            $from = trim($mFrom[1] ?? 'unknown');
        }

        // Ambil To:
        if (preg_match('/To:.*<(.+?)>/i', $raw, $mToEmail)) {
            $to = $mToEmail[1];
        } else {
            preg_match('/To: (.*)/i', $raw, $mTo);
            $to = trim($mTo[1] ?? 'fz@localhost');
        }

        // Ambil Subject:
        preg_match('/Subject: (.*)/i', $raw, $mSub);
        $subject = trim($mSub[1] ?? 'No Subject');
        
        // 3. Ambil Body (Cari baris kosong pertama sebagai pemisah header dan body)
        // Kita gunakan \r?\n untuk mendukung berbagai format line ending
        $parts = preg_split("/(\r?\n)\s*(\r?\n)/", $raw, 2);
        $body = isset($parts[1]) ? trim($parts[1]) : 'No Body Content';

        // 4. Simpan ke Database
        $email = Email::create([
            'ticket_number' => 'TIC-' . strtoupper(bin2hex(random_bytes(3))),
            'from_email'    => $from,
            'to_email'      => $to,
            'subject'       => $subject,
            'body'          => $body,
            'status'        => 'unread',
            'direction'     => 'incoming',
            'folder'        => 'INBOX',
        ]);

        // 5. Broadcast ke Frontend (Pusher/Reverb)
        try {
            broadcast(new NewEmailReceived($email))->toOthers();
        } catch (\Exception $e) {
            Log::error('Broadcast Error: ' . $e->getMessage());
        }

        return response()->json([
            'status' => 'processed',
            'ticket' => $email->ticket_number
        ]);
    }
}