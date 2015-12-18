<?php
namespace Tests\Services;

use App\Models\Todo;
use App\Services\TodoService;
use Tests\Mocks\TodoModelMock;

class TodoServiceTest extends \TestCase
{
    private $todoService;

    public function setUp()
    {
        parent::setUp();
        $this->todoService = new TodoService(new TodoModelMock());
    }

    public function testGetByStatusAsCompleted()
    {
        $todos = $this->todoService->getByStatus(TodoService::STATUS_COMPLETED);
        foreach ($todos as $todo) {
            $this->assertEquals('COMPLETED', $todo->status_name);
        }
    }
    public function testGetByStatusAsIncomplete()
    {
        $todos = $this->todoService->getByStatus(TodoService::STATUS_INCOMPLETE);
        foreach ($todos as $todo) {
            $this->assertEquals('INCOMPLETE', $todo->status_name);
        }
    }

    public function testGetDeleted()
    {
        $todos = $this->todoService->getDeleted();
        foreach ($todos as $todo) {
            $this->assertEquals('DELETED', $todo->status_name);
        }
    }
}
