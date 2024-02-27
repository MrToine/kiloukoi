<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Markdown;

use App\Models\User;
use App\Models\Newsletter;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newsletter;
    public $mails_list;

    /**
     * Create a new message instance.
     *
     * @param Newsletter $newsletter
     * @param array $mails_list
     */
    public function __construct(Newsletter $newsletter, $mail)
    {
        $this->newsletter = $newsletter;
        $this->mailto = $mail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->mailto,
            subject: $this->newsletter->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.newsletter.generic',
            with: [
                'mail' => $this->mailto,
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
