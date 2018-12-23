<?php

namespace App\Infrastructures\Mailer;

use Illuminate\Mail\Mailer;

use App\Infrastructures\Entities\Mails\Accounts\InviteAccountMail;

use App\Domains\UseCases\Accounts\AccountEmailUseCaseCommand;
use App\Domains\Models\Email\Email;
use App\Domains\Models\Tokens\Token;

class AccountMailer implements AccountEmailUseCaseCommand
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
    public function sendInviteMail(Email $email, Token $token): bool
    {
        $inviteAccountMail = new InviteAccountMail(
            $email->senderName()->value(),
            $token->value()
        );

        $this->mailer
            ->to($email->to()->value())
            ->send($inviteAccountMail);

        return true;
    }
}