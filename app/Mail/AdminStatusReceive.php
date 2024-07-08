<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\StudentParent; 

class AdminStatusReceive extends Mailable
{
    use Queueable, SerializesModels;


    public $applicant;
    public $student;
    public $parent;

    /**
     * Create a new message instance.
     */
    public function __construct($applicant, $student, $parent)
    {
        $this->applicant = $applicant;
        $this->student = $student;
        $this->parent = $parent;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Update on Your School Admission Application Status',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.applicant-status-update',
            with:[
                'applicant' => $this->applicant,
                'student' => $this->student,
                'parent' => $this->parent,
                'applicant_id' => $this->applicant->applicant_id,
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
