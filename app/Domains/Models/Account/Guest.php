<?php

namespace App\Domains\Models\Account;

use App\Domains\Models\BaseAccount\Account;
use App\Domains\Models\BaseAccount\AccountName;
use App\Domains\Models\BaseAccount\AccountPassword;
use App\Domains\Models\BaseAccount\AccountType;
use App\Domains\Models\Email\EmailAddress;

class Guest implements Account
{
    private $name;
    private $emailAddress;
    private $accountType;
    private $password;

    public function __construct(
        AccountName $name,
        EmailAddress $emailAddress,
        AccountType $accountType,
        ?AccountPassword $password = null
    ) {
        $this->name = $name;
        $this->emailAddress = $emailAddress;
        $this->accountType = $accountType;
        $this->password = $password;
    }

    public function name(): AccountName
    {
        return $this->name;
    }

    public function emailAddress(): EmailAddress
    {
        return $this->emailAddress;
    }

    public function inviteToken(): Hash
    {
        return $this->inviteToken;
    }

    public function accountType(): AccountType
    {
        return $this->accountType;
    }

    public function password(): ?AccountPassword
    {
        return $this->password;
    }
}