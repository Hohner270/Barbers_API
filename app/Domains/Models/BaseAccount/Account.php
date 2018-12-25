<?php

namespace App\Domains\Models\BaseAccount;

use App\Domains\Models\BaseAccount\AccountId;
use App\Domains\Models\BaseAccount\AccoutName;
use App\Domains\Models\BaseAccount\AccountPassword;

use App\Domains\Models\Email\EmailAddress;

interface Account
{
    /**
     * @return AccountName アカウント名
     */
    public function name(): AccountName;

    /**
     * @return EmailAdress メールアドレス
     */
    public function emailAddress(): EmailAddress;
}
