<?php

namespace App\Domains\Models\Account;

use App\Domains\Models\Account\AccountId;
use App\Domains\Models\Account\AccoutName;
use App\Domains\Models\Account\AccountPassword;
use App\Domains\Models\Account\AccoutHashedPassword;

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
     * @var AccountHashedPassword $password
     */
    private $password;

    /**
     * @param AccountId $id
     * @param AccountName $accountName
     * @param EmailAddress $emailAddress
     * @param AccountHashedPassword $password
     */
    public function __construct(AccountId $id, AccountName $accountName, EmailAddress $emailAddress, AccountHashedPassword $password)
    {
        $this->id = $id;
        $this->emailAddress = $emailAddress;
        $this->accountName = $accountName;
        $this->password = $password;
    }

    /**
     * @return AccountId $id
     */
    public function id(): AccountId
    {
        return $this->id;
    }

    /**
     * @return EmailAdress $emailAddress
     */
    public function emailAddress(): EmailAdress
    {
        return $this->emailAddress;
    }

    /**
     * @return AccountName $accountName
     */
    public function accountName(): AccountName
    {
        return $this->accountName;
    }

    /**
     * @return AccountHashedPassword $password
     */
    public function password(): AccountHashedPassword
    {
        return $this->password;
    }
}