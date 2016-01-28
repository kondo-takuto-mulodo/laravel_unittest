<?php
namespace Tests\Controllers;

use App\Http\Controllers\TodoController;
use Tests\Data\TodoData;
use \Mockery as Mock;

class TodoControllerTest extends \TestCase
{
    private $dataSet;
    private $todoService;

    public function setUp()
    {
        parent::setUp();

        $this->todoService = Mock::mock('App\Services\TodoServiceInterface');
        $this->dataSet = new TodoData();

        $this->app->bind(
            'App\Services\TodoServiceInterface',
            function () {
                return $this->todoService;
            }
        );
    }
    public function tearDown()
    {
        unset($this->dataSet);
        Mock::close();
    }
    public function testIndex()
    {
        $incomplete = $this->dataSet->getAsObject(TodoData::INCOMPLETE_STATUS_NAME);
        $completed = $this->dataSet->getAsObject(TodoData::COMPLETED_STATUS_NAME);

        // create Mock for model
        $this->todoService
            ->shouldReceive('getAll') // define target method name
            ->andReturn(array_merge($incomplete, $completed)); // inject expected data

        $response = $this->call('GET', '/todos');
        $this->assertResponseOk();
    }
    public function testSearchByStatus()
    {
        // create Mock for model
        $this->todoService
            ->shouldReceive('getByStatus') // define target method name
            ->andReturn($this->dataSet->getAsObject(TodoData::INCOMPLETE_STATUS_NAME)); // inject expected data

        $response = $this->call('GET', '/todos/status/' . \Config::get('app.status.todo.incomplete'));
        $this->assertResponseOk();
    }
}
