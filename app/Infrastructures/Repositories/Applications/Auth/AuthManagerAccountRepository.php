<?php

namespace App\Infrastructures\Repositories\Applications\Auth;

use Illuminate\Auth\AuthManager;

use App\Domains\UseCases\Accounts\AccountUseCaseQuery;

use App\Domains\Models\BaseAccount\Account;
use App\Domains\Models\BaseAccount\AccountPassword;
use App\Domains\Models\Email\EmailAddress;

class AuthManagerAccountRepository implements AccountUseCaseQuery
{
    private $authManager;

    public function __construct(AuthManager $authManager)
    {
        $this->authManager = $authManager;
    }

    /**
     * @param EmailAddress メールアドレス
     * @param AccountPassword アカウントのパスワード
     * @return mixed string JWTトークン | bool false ログイン失敗
     */
    public function login(EmailAddress $emailAddress, AccountPassword $password)
    {
        return $this->authManager
            ->guard('api')
            ->attempt([
                'email'    => $emailAddress->value(),
                'password' => $password->value(),
            ]);
    }

    public function myAccount(): Account
    {
        return $this->authManager
            ->guard('api')
            ->user()
            ->toDomain();
    }

    public function findByEmail(EmailAddress $email): Account
    {   
    }
}