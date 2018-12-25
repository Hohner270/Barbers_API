<?php

namespace App\Infrastructures\Mailers;

use Illuminate\Mail\Mailer;

use App\Infrastructures\Entities\Mails\Accounts\InviteAccountMail;

use App\Domains\UseCases\Mailers\MailerUseCaseCommand;
use App\Domains\Models\Email\Email;
use App\Domains\Models\Hash;

class LaravelMailer implements MailerUseCaseCommand
{
    /**
     * @var Mailer LaravelMailer
     */
    private $mailer;

    /**
     * @param Mailer LaravelMailer
     * @return bool
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param Email Emailドメイン
     * @return bool
     */
    public function sendInviteMail(Email $email, Hash $inviteToken): bool
    {
        $inviteAccountMail = new InviteAccountMail(
            $email->senderName()->value(),
            $inviteToken->value()
        );

        $this->mailer
            ->to($email->to()->value())
            ->send($inviteAccountMail);

        return true;
    }
}