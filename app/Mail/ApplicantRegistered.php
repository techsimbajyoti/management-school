<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\StudentParent; 

class ApplicantRegistered extends Mailable
{
    use Queueable, SerializesModels;

    protected $applicant;
    protected $verificationLink;
    /**
     * Create a new message instance.
     */
    public function __construct(StudentParent $applicant)
    {
        $this->applicant = $applicant;
        $this->verificationLink = url('login/');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Application Registration Verification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.applicant-registered',
            with: [
                  'applicant' => $this->applicant,
                  'applicant_id' => $this->applicant->applicant_id,
                  'verificationLink' => $this->verificationLink,
                   ],
           
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
