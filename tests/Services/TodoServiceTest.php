<?php
namespace Tests\Services;

use App\Models\Todo;
use App\Services\TodoService;
use Tests\Data\TodoData;
use \Mockery as Mock;

class TodoServiceTest extends \TestCase
{
    private $todo;
    private $dataSet;

    public function setUp()
    {
        parent::setUp();

        $this->todo = Mock::mock('App\Models\TodoModelInterface');
        $this->dataSet = new TodoData();
    }
    public function tearDown()
    {
        unset($this->dataSet);
        Mock::close();
    }
    public function testGetAll()
    {
        $statusIncomplete = \Config::get('app.status.todo.incomplete');
        $statusCompleted = \Config::get('app.status.todo.completed');

        $incomplete = $this->dataSet->getAsObject(TodoData::INCOMPLETE);
        $completed = $this->dataSet->getAsObject(TodoData::COMPLETED);

        // create Mock for model
        $this->todo
            ->shouldReceive('getAll') // define target method name
            ->andReturn(array_merge($incomplete, $completed)); // inject expected data

        // inject Mock to test target class
        $todoService = new TodoService($this->todo);

        // run target method
        $actual = $todoService->getAll();

        // assertion
        $this->assertNotEmpty($actual);

        foreach ($actual as $item) {
            if ($item->status == $statusIncomplete) {
                $this->assertEquals('INCOMPLETE', $item->status_name);
            } elseif ($item->status == $statusCompleted) {
                $this->assertEquals('COMPLETED', $item->status_name);
            }
        }
    }
    public function testGetByStatusWhenCompleted()
    {

        $status = \Config::get('app.status.todo.completed');

        // create Mock for model
        $this->todo
            ->shouldReceive('getByStatus') // define target method name
            ->with($status) // put parameter
            ->andReturn($this->dataSet->getAsObject(TodoData::COMPLETED)); // inject expacted data

        // inject Mock to test target class
        $todoService = new TodoService($this->todo);

        // run target method
        $actual = $todoService->getByStatus($status);

        // assertion
        $this->assertNotEmpty($actual);

        foreach ($actual as $item) {
            $this->assertEquals('COMPLETED', $item->status_name);
        }
    }
    public function testGetByStatusWhenIncomplete()
    {
        $status = \Config::get('app.status.todo.incomplete');

        // create Mock for model
        $this->todo
            ->shouldReceive('getByStatus') // define target method name
            ->with($status) // put parameter
            ->andReturn($this->dataSet->getAsObject(TodoData::INCOMPLETE)); // inject expacted data

        // inject Mock to test target class
        $todoService = new TodoService($this->todo);

        // run target method
        $actual = $todoService->getByStatus($status);

        $this->assertNotEmpty($actual);

        foreach ($actual as $item) {
            $this->assertEquals('INCOMPLETE', $item->status_name);
        }
    }

    public function testGetByStatusWhenDeleted()
    {
        // create Mock for model
        $this->todo
            ->shouldReceive('getDeleted') // define target method name
            ->andReturn($this->dataSet->getAsObject(TodoData::DELETED)); // inject expacted data

        // inject Mock to test target class
        $todoService = new TodoService($this->todo);

        $actual = $todoService->getByStatus(3);

        $this->assertNotEmpty($actual);

        foreach ($actual as $item) {
            $this->assertEquals('DELETED', $item->status_name);
        }
    }
}
