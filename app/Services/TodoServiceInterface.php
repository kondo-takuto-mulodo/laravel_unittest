<?php
namespace App\Services;

interface TodoServiceInterface {

    const STATUS_INCOMPLETE = 1;
    const STATUS_COMPLETED = 2;

    public static function findByStatus($status);
    public static function findDeleted();
}