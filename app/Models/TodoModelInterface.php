<?php
namespace App\Models;

interface TodoModelInterface
{
    public function getAll();
    public function getByStatus($status);
    public function getDeleted();
}
