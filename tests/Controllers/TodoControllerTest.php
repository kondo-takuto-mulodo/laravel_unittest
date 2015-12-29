<?php
namespace Tests\Controllers;

use App\Http\Controllers\TodoController;
use Tests\Mocks\TodoServiceMock;

class TodoControllerTest extends \TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->app->bind(
            'App\Services\TodoServiceInterface',
            function () {
                return new TodoServiceMock();
            }
        );
    }
    public function testIndex()
    {
        $response = $this->call('GET', '/todos');
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testSearchByIncomplete()
    {
        $response = $this->call('GET', '/todos/status/' . \Config::get('app.status.todo.incomplete'));
        $this->assertResponseOk();
    }
    public function testSearchByCompleted()
    {
        $response = $this->call('GET', '/todos/status/' . \Config::get('app.status.todo.completed'));
        $this->assertResponseOk();
    }
    public function testSearchByDeleted()
    {
        $response = $this->call('GET', '/todos/status/3');
        $this->assertResponseOk();
    }
}
