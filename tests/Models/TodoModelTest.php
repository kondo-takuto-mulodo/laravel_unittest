<?php
namespace Tests\Models;

use App\Models\Todo;
use Tests\Data\TodoData;

class TodoModelTest extends \TestCase
{
    private $todo;

    private $incomplete;
    private $completed;
    private $deleted;

    public function setUp()
    {
        parent::setUp();

        $this->todo = new Todo();
        $todoData = new TodoData();

        $this->incomplete = $todoData->getAsArray(TodoData::INCOMPLETE);
        $this->completed = $todoData->getAsArray(TodoData::COMPLETED);
        $this->deleted = $todoData->getAsArray(TodoData::DELETED);
    }
    public function tearDown()
    {
        unset($this->todo);
        unset($this->incomplete);
        unset($this->completed);
        unset($this->deleted);
    }
    public function testGetByStatus()
    {

        $this->truncate('todos');

        \DB::table('todos')->insert(
            array_merge(
                $this->incomplete,
                $this->completed,
                $this->deleted
            )
        );

        $actual = $this->todo->getByStatus(\Config::get('app.status.todo.incomplete'));

        $this->assertNotEmpty($actual);

        $i = 0;

        foreach ($actual as $item) {
            $this->assertEquals($this->incomplete[$i]['title'], $item->title);
            $this->assertEquals($this->incomplete[$i]['status'], $item->status);
            $i += 1;
        }
    }
    public function testGetDeleted()
    {
        $this->truncate('todos');

        \DB::table('todos')->insert(
            array_merge(
                $this->incomplete,
                $this->completed,
                $this->deleted
            )
        );

        $actual = $this->todo->getDeleted();

        $this->assertNotEmpty($actual);

        $i = 0;

        foreach ($actual as $item) {
            $this->assertEquals($this->deleted[$i]['title'], $item->title);
            $this->assertEquals($this->deleted[$i]['status'], $item->status);
            $i += 1;
        }
    }
    private function truncate($table)
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \DB::table($table)->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
