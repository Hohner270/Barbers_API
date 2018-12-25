<?php

namespace App\Domains\Models\Email;

use App\Domains\Models\BaseAccount\AccountName;
use App\Domains\Models\Email\EmailAddress;

class Email
{
    /**
     * @var AccountName 送信者名
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
     * @param AccountName 送信者名
     * @param EmailAddress 送信者メールアドレス
     * @param EmailAddress 受信者メールアドレス
     */
    public function __construct(AccountName $accountName, EmailAddress $from, EmailAddress $to)
    {
        $this->accountName = $accountName;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return AccountName 送信者名
     */
    public function senderName(): AccountName
    {
        return $this->accountName;
    }

    /**
     * @return AccountName 送信者メールアドレス
     */
    public function from(): EmailAddress
    {
        return $this->from;
    }

    /**
     * @return AccountName 受信者メールアドレス
     */
    public function to(): EmailAddress
    {
        return $this->to;
    }
}