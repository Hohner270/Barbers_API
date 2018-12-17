<?php

namespace App\Infrastructures\Repositories\Applications;

use Illuminate\Auth\AuthManager;

use App\Domains\Account\AccountQueryRepository;

class AuthManagerAccountRepository implements AccountQueryRepository
{
    private $authManager;

    public function __construct(AuthManager $authManager)
    {
        $this->authManager = $authManager;
    }

    public function __invoke(Request $request)
    {
        return $this->authManager->guard('api')->user();
    }
}