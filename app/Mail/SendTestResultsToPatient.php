<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendTestResultsToPatient extends Mailable
{
    use Queueable, SerializesModels;

    private string $technologist_name;
    private string $technologist_email;
    private string $patient_name;
    private string $patient_lastname;
    private string $test_type;
    private string $results;

    /**
     * Create a new message instance.
     */
    public function __construct($technologist_name, $technologist_email, $patient_name, $patient_lastname, $type, $results)
    {
        $this->technologist_email = $technologist_email;
        $this->technologist_name = $technologist_name;
        $this->patient_name = $patient_name;
        $this->patient_lastname = $patient_lastname;
        $this->test_type = $type;
        $this->results = $results;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->technologist_email, $this->technologist_name),
            subject: 'Dërgimi i rezultateve të testit te pacienti',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.send-test-results',
            with: [
                'patientName' => $this->patient_name,
                'patienLastname' => $this->patient_lastname,
                'testType' => $this->test_type,
                'results' => $this->results,
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
