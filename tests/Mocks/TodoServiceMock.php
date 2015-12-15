<?php
use App\Services\TodoServiceInterface;

class TodoServiceMock implements TodoServiceInterface
{
    public static function findByStatus($status)
    {
        echo 'foo';
    }
    public static function findDeleted()
    {
        echo 'bar';
    }
}
