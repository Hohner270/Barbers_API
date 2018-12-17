<?php

namespace App\Domains\Models\Account;

class AccountHashedPassword
{
    /**
     * @var string $hashedPassword
     */
    private $hashedPassword;

    /**
     * @param string $hashedPassword
     */
    public function __construct(string $hashedPassword)
    {
        $this->hashedPassword = $hashedPassword;
    }

    /**
     * @return string $hashedPassword
     */
    public function value(): string
    {
        return $this->hashedPassword;
    }
}