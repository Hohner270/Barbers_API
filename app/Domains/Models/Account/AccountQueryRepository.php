<?php

namespace App\Domains\Models\Account;

use App\Domains\Models\Account\Account;
use App\Domains\Models\Email\EmailAddress;

interface AccountQueryRepository
{
    /**
     * アプリケーションにログインしたアカウントを取得する
     * @return Account
     */
    public function LoggedInAccount(): Account;

    /**
     * メールアドレスでアカウントを取得する
     * @param EmailAddress $email
     */
    public function findByEmail(EmailAddress $email): Account;
}