<?php
namespace App\Services;

interface TodoServiceInterface
{

    public function getByStatus($status);
    public function getDeleted();
}
