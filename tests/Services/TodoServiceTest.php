<?php

use Illuminate\Database\Seeder;
use App\Services\TodoService;
use Tests\Data\TodoServiceTestSeeder;

class TodoServiceTest extends TestCase
{
    private $todo;

    public function setUp()
    {
        parent::setUp();
        $this->seed('TodoServiceTestSeeder');
    }

    public function testFindByStatus()
    {
        $actual = TodoService::findByStatus(TodoService::STATUS_INCOMPLETE);
        $expected = TodoServiceTestSeeder::$incomplete;

        $this->assertNotEmpty($actual);
        $this->assertCount(count($expected), $actual);

        $i = 0;

        foreach ($actual as $item) {
            $this->assertEquals($expected[$i]['title'], $item->title);
            $this->assertEquals($expected[$i]['status'], $item->status);
            $i += 1;
        }
    }
    public function testFindDeleted()
    {
        $actual = TodoService::findDeleted();
        $expected = TodoServiceTestSeeder::$deleted;

        $this->assertNotEmpty($actual);
        $this->assertCount(count($expected), $actual);

        $i = 0;

        foreach ($actual as $item) {
            $this->assertEquals($expected[$i]['title'], $item->title);
            $this->assertEquals($expected[$i]['status'], $item->status);
            $i += 1;
        }
    }
}
