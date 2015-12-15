<?php
namespace Tests\Seeders;

class TodoServiceTestSeeder extends Seeder
{

    public static $incomplete = [
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

    public static $completed = [
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

    public static $deleted = [
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

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('todos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        DB::table('todos')->insert(
                                   array_merge(
                                               self::$incomplete,
                                               self::$completed,
                                               self::$deleted
                                               )
                                   );
    }
}