<?php

namespace App\Infrastructures\Repositories\Applications\Auth;

use Illuminate\Auth\AuthManager;

use App\Domains\UseCases\Account\AccountUseCaseQuery;

use App\Domains\Models\Account\Account;
use App\Domains\Models\Email\EmailAddress;

class AuthManagerAccountRepository implements AccountUseCaseQuery
{
    private $authManager;

    public function __construct(AuthManager $authManager)
    {
        $this->authManager = $authManager;
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