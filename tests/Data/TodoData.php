<?php
namespace Tests\Data;

use Tests\Data\AbstractData;
use App\Services\TodoService;

class TodoData extends AbstractData
{

    const INCOMPLETE = 'incomplete';

    public $incomplete = [
                           [
                            'title' => 'Incomplete02',
                            'status' => 1,
                            'created_at' => '2015-07-02',
                            'updated_at' => '2015-07-02',
                            'deleted_at' => null,
                            ],
                           [
                            'title' => 'Incomplete01',
                            'status' => 1,
                            'created_at' => '2015-07-01',
                            'updated_at' => '2015-07-01',
                            'deleted_at' => null,
                            ],
                           ];

    const COMPLETED = 'completed';

    public $completed = [
                          [
                           'title' => 'Completed02',
                           'status' => 2,
                           'created_at' => '2015-07-02',
                           'updated_at' => '2015-07-02',
                           'deleted_at' => null,
                           ],
                          [
                           'title' => 'Completed01',
                           'status' => 2,
                           'created_at' => '2015-07-01',
                           'updated_at' => '2015-07-01',
                           'deleted_at' => null,
                           ],
                          ];

    const DELETED = 'deleted';

    public $deleted = [
                        [
                         'title' => 'Deleted02',
                         'status' => 1,
                         'created_at' => '2015-06-30',
                         'updated_at' => '2015-06-30',
                         'deleted_at' => '2015-07-02'
                         ],
                        [
                         'title' => 'Deleted01',
                         'status' => 2,
                         'created_at' => '2015-06-30',
                         'updated_at' => '2015-06-30',
                         'deleted_at' => '2015-07-01'
                         ],
                        ];
}
