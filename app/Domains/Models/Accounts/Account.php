<?php

namespace App\Domains\Models\Accounts;

use App\Domains\Models\Accounts\AccountId;
use App\Domains\Models\Accounts\AccoutName;
use App\Domains\Models\Accounts\AccountPassword;
use App\Domains\Models\Accounts\AccoutHashedPassword;

use App\Domains\Models\Email\EmailAddress;

class Account
{
    /**
     * @var AccountId $id
     */
    private $id;

    /**
     * @var AccountName $accountName
     */
    private $accountName;

    /**
     * @var EmailAddress $emailAddress
     */
    private $emailAddress;

    /**
     * @param AccountId $id
     * @param AccountName $accountName
     * @param EmailAddress $emailAddress
     */
    public function __construct(AccountId $id, AccountName $accountName, EmailAddress $emailAddress)
    {
        $this->id = $id;
        $this->accountName = $accountName;
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return AccountId $id
     */
    public function id(): AccountId
    {
        return $this->id;
    }

    /**
     * @return AccountName $accountName
     */
    public function accountName(): AccountName
    {
        return $this->accountName;
    }

    /**
     * @return EmailAdress $emailAddress
     */
    public function emailAddress(): EmailAddress
    {
        return $this->emailAddress;
    }
}
