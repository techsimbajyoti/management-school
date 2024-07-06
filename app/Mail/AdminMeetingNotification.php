<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\MeetingStatus; 

class AdminMeetingNotification extends Mailable
{
    use Queueable, SerializesModels;
    protected $meeting;
    protected $applicant;
    
    /**
     * Create a new message instance.
     */
    public function __construct(MeetingStatus $meeting,$applicant)
    {
        $this->meeting = $meeting;
        $this->applicant = $applicant;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Admin Meeting Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-meeting-notification',
            with:[
                'meeting' => $this->meeting,
                'applicant' => $this->applicant,
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
