<?php
namespace App\Services;

interface TodoServiceInterface
{

    const STATUS_INCOMPLETE = 1;
    const STATUS_COMPLETED = 2;

    public function getByStatus($status);
    public function getDeleted();
}
