<?php

use App\Services\TodoServiceInterface;

class TodoServiceMock implements TodoServiceInterface {

    public static function findByStatus($status)
    {
    }
    public static function findDeleted()
    {
    }
}