<?php

namespace App\Events;

use App\Models\Email;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class NewEmailReceived implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email;

    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    public function broadcastOn()
    {
        return new Channel('emails');
    }

    public function broadcastAs()
    {
        return 'new.email';
    }

    public function broadcastWith()
    {
        // Sesuaikan data dengan yang dibutuhkan JavaScript di Blade
        return [
            'id' => $this->email->id,
            'ticket_number' => $this->email->ticket_number,
            'from' => $this->email->from_email,
            'subject' => $this->email->subject,
            'preview' => Str::limit(strip_tags((string) $this->email->body), 60),
            'date' => $this->email->created_at->toIso8601String(),
            'status' => $this->email->status
        ];
    }
}