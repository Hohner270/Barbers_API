<?php

namespace App\Domains\Models\Email;

use App\Domains\Models\Account\AccountName;

use App\Domains\Models\Email\EmailAddress;

class Email
{
    /**
     * @var AccountName アカウント名
     */
    private $accountName;

    /**
     * @var EmailAddress 送信者メールアドレス
     */
    private $from;

    /**
     * @var EmailAddress 受信者メールアドレス
     */
    private $to;

    /**
     * @param AccountName 
     * @param EmailAddress 送信者メールアドレス
     * @param EmailAddress 受信者メールアドレス
     */
    public function __construct(AccountName $accountName, EmailAddress $from, EmailAddress $to)
    {
        $this->accountName = $accountName;
        $this->from = $from;
        $this->to = $to;
    }

    public function senderName(): AccountName
    {
        return $this->accountName;
    }

    public function from(): EmailAddress
    {
        return $this->from;
    }

    public function to(): EmailAddress
    {
        return $this->to;
    }
}