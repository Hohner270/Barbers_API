<?php

namespace App\Infrastructures\Entities\Eloquents;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

use App\Domains\Models\Accounts\Account;
use App\Domains\Models\Accounts\AccountId;
use App\Domains\Models\Accounts\AccountName;
use App\Domains\Models\Accounts\AccountHashedPassword;

use App\Domains\Models\Email\EmailAddress;

class EloquentUser extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier(): int
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    public function toDomain(): Account
    {
        return new Account(
            new AccountId($this->id),
            new AccountName($this->name),
            new EmailAddress($this->email)
        );
    }
}
