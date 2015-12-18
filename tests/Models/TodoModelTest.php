<?php
namespace Tests\Models;

use App\Services\TodoService;
use App\Models\Todo;

class TodoModelTest extends \TestCase
{
    private $incomplete = [
                           [
                            'title' => 'Incomplete02',
                            'status' => TodoService::STATUS_INCOMPLETE,
                            'created_at' => '2015-07-02',
                            'updated_at' => '2015-07-02',
                            'deleted_at' => null,
                            ],
                           [
                            'title' => 'Incomplete01',
                            'status' => TodoService::STATUS_INCOMPLETE,
                            'created_at' => '2015-07-01',
                            'updated_at' => '2015-07-01',
                            'deleted_at' => null,
                            ],
                           ];

    private $completed = [
                          [
                           'title' => 'Completed02',
                           'status' => TodoService::STATUS_COMPLETED,
                           'created_at' => '2015-07-02',
                           'updated_at' => '2015-07-02',
                           'deleted_at' => null,
                           ],
                          [
                           'title' => 'Completed01',
                           'status' => TodoService::STATUS_COMPLETED,
                           'created_at' => '2015-07-01',
                           'updated_at' => '2015-07-01',
                           'deleted_at' => null,
                           ],
                          ];

    private $deleted = [
                        [
                         'title' => 'Deleted02',
                         'status' => TodoService::STATUS_INCOMPLETE,
                         'created_at' => '2015-06-30',
                         'updated_at' => '2015-06-30',
                         'deleted_at' => '2015-07-02'
                         ],
                        [
                         'title' => 'Deleted01',
                         'status' => TodoService::STATUS_INCOMPLETE,
                         'created_at' => '2015-06-30',
                         'updated_at' => '2015-06-30',
                         'deleted_at' => '2015-07-01'
                         ],
                        ];

    private $todo;

    public function setUp()
    {
        parent::setUp();
        $this->todo = new Todo();
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

        $actual = $this->todo->getByStatus(TodoService::STATUS_INCOMPLETE);

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
