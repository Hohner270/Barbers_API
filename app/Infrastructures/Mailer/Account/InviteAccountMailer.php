<?php

namespace App\Infrastructures\Repositories\Application\Email;

use Illuminate\Mail\Mailer;
use App\Infrastructures\Entities\Mails\Auth\InviteAccountMail;

use App\Domains\UseCases\Email\EmailUseCaseCommand;

use App\Domains\Models\Email\Email;

class InviteAccountMailer implements EmailUseCaseCommand
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
    public function send(Email $email): bool
    {
        $inviteAccountMail = new InviteAccountMail(
            $email->senderName()->value()
        );

        $this->mailer
            ->to($email->to()->value())
            ->send($inviteAccountMail);

        return true;
    }
}