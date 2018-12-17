<?php

namespace App\Infrastructures\Eloquents;

use Illuminate\Database\Eloquent\Model;

class EloquentComment extends Model
{
    /**
     * @var string
     */
    protected $table = 'comments';
}
