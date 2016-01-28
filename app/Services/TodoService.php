<?php
namespace App\Services;

use App\Models\TodoModelInterface;

class TodoService implements TodoServiceInterface
{
    private $todo;

    public function __construct(TodoModelInterface $todo)
    {
        $this->todo = $todo;
    }
    public function getAll()
    {
        $todos = $this->todo->getAll();
        return $this->setStatusName($todos);
    }
    public function getByStatus($status)
    {
        if ($status == \Config::get('app.status.todo.incomplete') ||
            $status == \Config::get('app.status.todo.completed')) {
            $todos = $this->todo->getByStatus($status);
        } else {
            $todos = $this->todo->getDeleted();
        }
        return $this->setStatusName($todos);
    }
    private function setStatusName($todos)
    {
        foreach ($todos as $todo) {

            if ($todo->deleted_at) {
                $todo->status_name = 'DELETED';
            } elseif ($todo->status == \Config::get('app.status.todo.incomplete')) {
                $todo->status_name = 'INCOMPLETE';
            } elseif ($todo->status == \Config::get('app.status.todo.completed')) {
                $todo->status_name = 'COMPLETED';
            }
        }
        return $todos;
    }
}
