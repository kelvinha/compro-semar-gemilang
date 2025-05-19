<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactMessage;

class ContactMessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    public function __construct(ContactMessage $message)
    {
        $this->message = $message;
    }

    public function build()
    {
        return $this->subject('New Contact Message Received')
                    ->markdown('emails.contact.message-received');
    }
}
