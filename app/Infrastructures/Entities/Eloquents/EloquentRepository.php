<?php

namespace App\Infrastructures\Entities\Eloquents;

use Illuminate\Database\Eloquent\Model;

class EloquentRepository extends Model
{
    /**
     * @var string
     */
    protected $table = 'repositories';
}
