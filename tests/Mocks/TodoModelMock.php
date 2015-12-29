<?php
namespace Tests\Mocks;

use App\Models\TodoModelInterface;
use Tests\Data\TodoData;

class TodoModelMock implements TodoModelInterface
{
    private $incomplete;
    private $completed;
    private $deleted;

    public function __construct()
    {
        $todoData = new TodoData();

        $this->incomplete = $todoData->getAsObject(TodoData::INCOMPLETE);
        $this->completed = $todoData->getAsObject(TodoData::COMPLETED);
        $this->deleted = $todoData->getAsObject(TodoData::DELETED);
    }
    public function getAll()
    {
        return array_merge($this->incomplete, $this->completed);
    }
    public function getByStatus($status)
    {
        if ($status == \Config::get('app.status.todo.incomplete')) {
            return $this->incomplete;
        } elseif ($status == \Config::get('app.status.todo.completed')) {
            return $this->completed;
        }
    }
    public function getDeleted()
    {
        return $this->deleted;
    }
}
