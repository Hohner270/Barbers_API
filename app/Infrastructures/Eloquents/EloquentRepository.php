<?php

namespace App\Infrastructures\Eloquents;

use Illuminate\Database\Eloquent\Model;

class EloquentRepository extends Model
{
    /**
     * @var string
     */
    protected $table = 'repositories';
}