<?php

namespace App\Domains\UseCases\Email;

interface EmailUseCaseCommand
{
    /**
     * @param Email Emailドメイン
     */
    public function send(Email $email);
}