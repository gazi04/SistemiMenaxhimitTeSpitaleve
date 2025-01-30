<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentCanceled extends Mailable
{
    use Queueable, SerializesModels;

    public string $appointment_date;
    public string $doctor_email;
    public string $doctor_name;
    public string $patient_name;

    /**
     * Create a new message instance.
     */
    public function __construct($appointment_date, $doctor_email, $doctor_name, $patient_name)
    {
        $this->appointment_date = $appointment_date;
        $this->doctor_email = $doctor_email;
        $this->doctor_name = $doctor_name;
        $this->patient_name = $patient_name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->doctor_email, $this->doctor_name),
            subject: 'Takimi juaj për konsulta mjekësore është anuluar.',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.appointment-canceled',
            with: [
                'appointment_date' => $this->appointment_date,
                'doctor_name' => $this->doctor_name,
                'patient_name' => $this->patient_name
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
