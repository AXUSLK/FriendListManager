<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvitationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $friendName;
    public $invitationUrl;

    /**
     * Create a new message instance.
     */
    public function __construct($userName, $friendName, $invitationUrl)
    {
        $this->userName = $userName;
        $this->friendName = $friendName;
        $this->invitationUrl = $invitationUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invitation')
            ->subject('Invitation to join my friends list')
            ->with([
                'title' => 'Invitation to join my friends list',
                'userName' => $this->userName,
                'friendName' => $this->friendName,
                'invitationUrl' => $this->invitationUrl,
            ]);
    }
}
