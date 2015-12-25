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
    public function tearDown()
    {
        unset($this->todoService);
    }
    public function testGetByStatusWhenCompleted()
    {
        $actual = $this->todoService->getByStatus(\Config::get('app.status.todo.completed'));

        $this->assertNotEmpty($actual);

        foreach ($actual as $item) {
            $this->assertEquals('COMPLETED', $item->status_name);
        }
    }
    public function testGetByStatusWhenIncomplete()
    {
        $actual = $this->todoService->getByStatus(\Config::get('app.status.todo.incomplete'));

        $this->assertNotEmpty($actual);

        foreach ($actual as $item) {
            $this->assertEquals('INCOMPLETE', $item->status_name);
        }
    }

    public function testGetDeleted()
    {
        $actual = $this->todoService->getDeleted();

        $this->assertNotEmpty($actual);

        foreach ($actual as $item) {
            $this->assertEquals('DELETED', $item->status_name);
        }
    }
}
