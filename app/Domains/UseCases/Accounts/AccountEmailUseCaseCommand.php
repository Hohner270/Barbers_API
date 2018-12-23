<?php

namespace App\Domains\UseCases\Accounts;

use App\Domains\Models\Email\Email;
use App\Domains\Models\Tokens\Token;

interface AccountEmailUseCaseCommand
{
    /**
     * @param Email Emailドメイン
     */
    public function sendInviteMail(Email $email, Token $token);
}