<?php

namespace App\Domains\UseCases\Accounts;

use App\Domains\Models\Accounts\Account;
use App\Domains\Models\Email\EmailAddress;

interface AccountUseCaseQuery
{
    /**
     * アプリケーションにログインしたアカウントを取得する
     * @return Account
     */
    public function myAccount(): Account;

    /**
     * メールアドレスでアカウントを取得する
     * @param EmailAddress $email
     */
    public function findByEmail(EmailAddress $email): Account;
}