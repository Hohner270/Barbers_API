<?php

namespace App\Mails\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteAccountMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var AccountName 送信者名
     */
    public $senderName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth.inviteAccount');
    }
}
