<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Markdown;

use App\Models\Newsletter;
use App\Models\User;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Newsletter $newsletter, $mails_list)
    {
        $this->mails_list = $mails_list;
        $this->newsletter = $newsletter;
        $this->recipient = null;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        foreach ($this->mails_list as $recipient) {
            $this->recipient = $recipient;
            $this->to($recipient);
            $this->subject($this->newsletter->title);
        }

        return $this->markdown('emails.newsletter.generic')->with('recipient', $this->recipient);
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
