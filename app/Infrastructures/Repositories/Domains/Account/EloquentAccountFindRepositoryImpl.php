<?php

namespace App\Infrastructures\Repositories\Domains\Account;

use App\Infrastructures\Eloquents\EloquentUser;

use App\Domains\Models\Account\Account;
use App\Domains\Models\Account\AccountFindRepository;

use App\Domains\Models\Email\EmailAddress;

class EloquentAccountFindRepositoryImpl implements AccountFindRepository
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
     * @param EmailAddress アドレス
     * @return Account アカウントドメイン
     */
    public function findByEmail(EmailAddress $email): Account
    {
        $record = $this->eloquentAccount->where('email', $email->value())->first();
        $account = $record->toDomain();
        return $account;
    }
}