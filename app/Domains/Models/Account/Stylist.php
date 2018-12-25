<?php

namespace App\Domains\Models\Account;

use App\Domains\Models\BaseAccount\Account;
use App\Domains\Models\BaseAccount\AccountId;
use App\Domains\Models\BaseAccount\AccountName;
use App\Domains\Models\BaseAccount\AccountPassword;
use App\Domains\Models\Email\EmailAddress;

class Stylist implements Account
{
    const ACCOUNT_TYPE = 1; // Stylist

    /**
     * @var AccountId アカウントID
     */
    private $id;

    /**
     * @var AccountName アカウント名
     */
    private $name;

    /**
     * @var EmailAddress メールアドレス
     */
    private $emailAddress;

    /**
     * @var AccountPassword アカウントパスワード
     */
    private $password;

    /**
     * @param AccountName
     * @param EmailAddress
     * @param AccountPassword アカウントパスワード デフォルトでNull Oauthではパスワードを扱わないため
     */
    public function __construct(
        AccountId $id,
        AccountName $name,
        EmailAddress $emailAddress,
        ?AccountPassword $password = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->emailAddress = $emailAddress;
        $this->password = $password;
    }

    /**
     * @return AccountId アカウントID
     */
    public function id(): AccountId
    {
        return $this->id;
    }

    /**
     * @return AccountName アカウント名
     */
    public function name(): AccountName
    {
        return $this->name;
    }

    /**
     * @return EmailAddress メールアドレス
     */
    public function emailAddress(): EmailAddress
    {
        return $this->emailAddress;
    }

    /**
     * @return AccountPassword アカウントパスワード
     */
    public function password(): AccountPassword
    {
        return $this->password;
    }
}