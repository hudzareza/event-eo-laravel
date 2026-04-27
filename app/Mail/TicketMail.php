<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class TicketMail extends Mailable
{
    public $participant;
    public $event;

    public function __construct($participant, $event)
    {
        $this->participant = $participant;
        $this->event = $event;
    }

    public function build()
    {
        return $this->subject('Tiket Event Kamu 🎫')
            ->view('emails.ticket');
    }
}