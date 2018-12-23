<?php

namespace App\Domains\UseCases\Mailers;

use App\Domains\Models\Email\Email;
use App\Domains\Models\Tokens\Token;

interface MailerUseCaseCommand
{
    /**
     * @param Email Emailドメイン
     */
    public function sendInviteMail(Email $email, Token $token);
}