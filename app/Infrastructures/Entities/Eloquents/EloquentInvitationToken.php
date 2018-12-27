<?php

namespace App\Infrastructures\Entities\Eloquents;

use Illuminate\Database\Eloquent\Model;

class EloquentInvitationToken extends Model
{
    /**
     * @var string
     */
    protected $table = 'invitation_tokens';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'email', 'token',
    ];
}
