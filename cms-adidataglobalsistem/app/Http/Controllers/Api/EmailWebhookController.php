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

        // VALIDASI EMAIL KOSONG
        if (empty($raw) || strlen(trim($raw)) < 10) {
            Log::warning('Email kosong atau terlalu pendek', ['length' => strlen($raw ?? '')]);
            return response()->json([
                'status' => 'rejected',
                'reason' => 'Empty or invalid email'
            ], 400);
        }

        // 1. Filter MAILER-DAEMON
        if (
            stripos($raw, 'From MAILER-DAEMON') !== false || 
            stripos($raw, 'From: MAILER-DAEMON') !== false || 
            stripos($raw, 'Return-Path: <>') !== false ||
            stripos($raw, 'Return-Path: <MAILER-DAEMON>') !== false
        ) {
            Log::info('Ignored System Email (MAILER-DAEMON)'); 
            return response()->json(['status' => 'ignored_system_mail']);
        }

        // 2. Ekstrak From
        if (preg_match('/From:.*<(.+?)>/i', $raw, $mFromEmail)) {
            $from = $mFromEmail[1];
        } else {
            preg_match('/From: (.*)/i', $raw, $mFrom);
            $from = trim($mFrom[1] ?? '');
        }

        // 3. Ekstrak Subject
        preg_match('/Subject: (.*)/i', $raw, $mSub);
        $subject = trim($mSub[1] ?? 'No Subject');

        // VALIDASI FROM EMAIL (subject ga perlu divalidasi email)
        if (empty($from) || !filter_var($from, FILTER_VALIDATE_EMAIL)) {
            Log::warning('Invalid From email', ['from' => $from]);
            return response()->json([
                'status' => 'rejected',
                'reason' => 'Invalid sender email'
            ], 400);
        }

        // 4. Ekstrak To
        if (preg_match('/To:.*<(.+?)>/i', $raw, $mToEmail)) {
            $to = $mToEmail[1];
        } else {
            preg_match('/To: (.*)/i', $raw, $mTo);
            $to = trim($mTo[1] ?? 'fz@localhost');
        }

        // 5. Ambil Body
        $parts = preg_split("/(\r?\n)\s*(\r?\n)/", $raw, 2);
        $body = isset($parts[1]) ? trim($parts[1]) : 'No Body Content';

        Log::info('Processing email', [
            'from' => $from,
            'to' => $to,
            'subject' => substr($subject, 0, 50)
        ]);

        // 6. Simpan ke Database
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

        // 7. Broadcast ke Frontend
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