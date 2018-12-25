<?php

namespace App\Infrastructures\Repositories\Eloquents;

use App\Domains\UseCases\Accounts\AccountUseCaseCommand;
use App\Domains\Models\Account\Guest;

use App\Infrastructures\Entities\Eloquents\EloquentUser;

class EloquentAccountRepository implements AccountUseCaseCommand
{
    /**
     * @var EloquentUser
     */
    private $user;
    /**
     * @param EloquentUser
     */
    public function __construct(EloquentUser $user)
    {
        $this->user = $user;
    }

    public function save(Guest $guest)
    {
        $this->user->role_id = $guest->accountType()->value();
        $this->user->name = $guest->name()->value();
        $this->user->email = $guest->emailAddress()->value();
        $this->user->password = $guest->password()->value();
        $this->user->save();
    }
}