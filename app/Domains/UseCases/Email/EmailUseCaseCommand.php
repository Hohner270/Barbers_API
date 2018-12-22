<?php

namespace App\Domains\UseCases\Email;

use App\Domains\Models\Email\Email;

interface EmailUseCaseCommand
{
    /**
     * @param Email Emailドメイン
     */
    public function send(Email $email);
}