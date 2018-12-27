<?php

namespace App\Domains\UseCases\Mailers;

use App\Domains\Models\Email\Email;
use App\Domains\Models\BaseToken\HashedToken;

interface MailerUseCaseCommand
{
    /**
     * @param Email Emailドメイン
     * @param HashedToken 招待トークン
     */
    public function sendInviteMail(Email $email, HashedToken $token);
}