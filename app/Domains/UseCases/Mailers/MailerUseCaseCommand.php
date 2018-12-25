<?php

namespace App\Domains\UseCases\Mailers;

use App\Domains\Models\Email\Email;
use App\Domains\Models\Hash;

interface MailerUseCaseCommand
{
    /**
     * @param Email Emailドメイン
     */
    public function sendInviteMail(Email $email, Hash $inviteToken);
}