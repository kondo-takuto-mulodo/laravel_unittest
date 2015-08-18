<?php
namespace App\Services;

use App\Models\Todo;

class TodoService Implements TodoServiceInterface {

    public static function findByStatus($status)
    {
        return Todo::query()->select('*')->where('status',  '=', $status)->orderBy('updated_at', 'desc')->get();
    }
    public static function findDeleted()
    {
        return Todo::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
    }
}