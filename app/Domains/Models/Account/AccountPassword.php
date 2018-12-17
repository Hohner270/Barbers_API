<?php

namespace App\Domains\Models\Account;

use App\Domains\Models\Account\AccountHashedPassword;

class AccountPassword
{
    /**
     * @var string $password
     */
    private $password;

    /**
     * @param string $password
     */
    public function __construct(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->password;
    }

    /**
     * @return AccountHashedPassword
     */
    public function hash(): AccountHashedPassword
    {
        return new AccountHashedPassword(password_hash($this->password, PASSWORD_DEFAULT));
    }
}