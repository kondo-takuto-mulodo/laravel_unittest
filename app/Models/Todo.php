<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TodoModelInterface;

class Todo extends Model implements TodoModelInterface
{
    use SoftDeletes;

    protected $guraded = ['id'];
    protected $dates = ['completed_at', 'deleted_at'];

    public function getAll()
    {
        return Todo::query()->select('*')->get();
    }
    public function getByStatus($status)
    {
        return Todo::query()->select('*')->where('status', '=', $status)->orderBy('updated_at', 'desc')->get();
    }
    public function getDeleted()
    {
        return Todo::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
    }
}
