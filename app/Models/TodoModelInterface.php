<?php
namespace App\Models;

interface TodoModelInterface
{
    public function getByStatus($status);
    public function getDeleted();
}
