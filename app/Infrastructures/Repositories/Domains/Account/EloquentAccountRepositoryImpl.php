<?php

namespace App\Infrastructures\Repositories\Domains\Account;

use App\Infrastructures\Eloquents\EloquentAccount;

use App\Domains\Models\Account\Account;
use App\Domains\Models\Account\AccountName;
use App\Domains\Models\Account\AccountHashedPassword;
use App\Domains\Models\Account\AccountRepository;

use App\Domains\Models\Email\EmailAddress;

class EloquentAccountRepositoryImpl implements AccountRepository
{
    /**
     * @var EloquentUser Eloquentアカウントモデル
     */
    private $eloquentUser;

    /**
     * @param EloquentUser Eloquentアカウントモデル
     */
    public function __construct(EloquentUser $eloquentUser)
    {
        $this->eloquentUser = $eloquentUser;
    }

    /**
     * ユーザー登録
     * @param AccountName アカウント名
     * @param EmailAddress emailアドレス
     * @param AccountPasword アカウントパスワード
     * @return Account アカウントドメイン
     * 
     * */ 
    public function store(AccountName $accountName, EmailAddress $emailAddress, AccountHashedPassword $accountHashedPassword): Account
    {
        $this->eloquentUser->name = $accountName->value();
        $this->eloquentUser->email = $emailAddress->value();
        $this->eloquentUser->password = $accountHashedPassword->value();
        $this->eloquentUser->save();

        return $this->eloquentUser->toDomain();
    }
    /** 
     * @param EmailAddress アドレス
     * @return Account アカウントドメイン
     */
    public function findByEmail(EmailAddress $email): Account
    {
        $account = $this->eloquentUser->where('email', $email);
        return $account;
    }
}