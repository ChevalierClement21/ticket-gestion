<?php

namespace App\Mail;

use App\Models\Commentaire;
use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommentaireEnvoyeAuDev extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $commentaire;

    /**
     * Create a new message instance.
     */
    public function __construct(Ticket $ticket, Commentaire $commentaire)
    {
        $this->commentaire = $commentaire;
        $this->ticket = $ticket;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Un nouveau commentaire sur votre ticket : '.$this->ticket->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.commentaire_envoye_au_dev',
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
