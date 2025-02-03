<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendIdNumberToStaff extends Mailable
{
    use Queueable, SerializesModels;

    private string $id;
    private string $name;
    private string $last_name = "";

    /**
     * Create a new message instance.
     */
    public function __construct($id, $name, $lastName)
    {
        $this->id = $id;
        $this->name = $name;
        $this->last_name = $lastName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('administratoriSMS@gmail.com', 'Administratori i Sistemit të Menaxhimit të Spitalit'),
            subject: 'Dërgimi i numrit tuaj ID',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.send-staff-id',
            with: [
                'staffId' => $this->id,
                'name' => $this->name,
                'lastname' => $this->last_name
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
