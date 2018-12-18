<?php

namespace App\Domains\Repositories\Email;

interface MailCommandRepository
{
    /**
     * @param Email Emailドメイン
     */
    public function send(Email $email);
}