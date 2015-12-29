<?php
namespace App\Services;

interface TodoServiceInterface
{
    public function getAll();
    public function getByStatus($status);
    public function getDeleted();
}
