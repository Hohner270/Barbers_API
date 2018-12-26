<?php

namespace App\Infrastructures\Repositories\Eloquents;

use App\Domains\UseCases\Accounts\AccountUseCaseCommand;

use App\Domains\Models\Account\Guest;
use App\Domains\Models\BaseAccount\Account;

use App\Infrastructures\Entities\Eloquents\EloquentUser;

class EloquentAccountRepository implements AccountUseCaseCommand
{
    /**
     * @var EloquentUser
     */
    private $eloquentUser;
    /**
     * @param EloquentUser
     */
    public function __construct(EloquentUser $eloquentUser)
    {
        $this->eloquentUser = $eloquentUser;
    }

    public function save(Guest $guest): Account
    {
        $user = $this->eloquentUser->firstOrCreate(
            [
                'name'     => $guest->name()->value(),
                'email'    => $guest->emailAddress()->value(),
                'password' => $guest->password()->value(),
            ],
            [
                'role_id'  => $guest->accountType()->value(),
            ]
        );

        return $user->toDomain();
    }
}