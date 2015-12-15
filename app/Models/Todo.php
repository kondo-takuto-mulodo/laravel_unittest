<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    protected $guraded = ['id'];
    protected $dates = ['completed_at', 'deleted_at'];
}
