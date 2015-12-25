<?php
namespace Tests\Mocks;

use App\Services\TodoServiceInterface;
use Tests\Mocks\AbstractMock;
use Tests\Data\TodoData;

class TodoServiceMock extends AbstractMock implements TodoServiceInterface
{

    public function __construct()
    {
        $todoData = new TodoData();

        $this->incomplete = $todoData->getAsObject(TodoData::INCOMPLETE);

        foreach ($this->incomplete as &$record) {
            $record->status_name = 'INCOMPLETE';
        }

        $this->completed = $todoData->getAsObject(TodoData::COMPLETED);

        foreach ($this->completed as &$record) {
            $record->status_name = 'COMPLETED';
        }

        $this->deleted = $todoData->getAsObject(TodoData::DELETED);

        foreach ($this->deleted as &$record) {
            $record->status_name = 'DELETED';
        }
    }
    public function getByStatus($status)
    {
        if ($status == \Config::get('status.todo.incomplete')) {
            return $this->incomplete;
        } elseif ($status == \Config::get('status.todo.completed')) {
            return $this->completed;
        }
    }
    public function getDeleted()
    {
        return $this->deleted;
    }
}
