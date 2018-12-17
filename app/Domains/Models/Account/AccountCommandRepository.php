<?php

namespace App\Domains\Models\Account;

use App\Domains\Models\Account\Account;
use App\Domains\Models\Account\AccountName;
use App\Domains\Models\Email\EmailAddress;
use App\Domains\Models\Account\AccountHashedPassword;

interface AccountCommandRepository
{
    /**
     * @param AccountName $accountName
     * @param EmailAddress $emailAddress
     * @param AccountHashedPassword $accountPassword
     * @return Account
     */
    public function store(AccountName $accountName, EmailAddress $emailAddress, AccountHashedPassword $accountPassword): Account;
}