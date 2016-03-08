<?php
namespace Tests\Data;

use Tests\Data\AbstractData;

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

    const INCOMPLETE_STATUS_NAME = 'incompleteStatusName';

    public $incompleteStatusName = [
                           [
                            'title' => 'Incomplete02',
                            'status' => 1,
                            'status_name' => 'INCOMPLETE',
                            'created_at' => '2015-07-02',
                            'updated_at' => '2015-07-02',
                            'deleted_at' => null,
                            ],
                           [
                            'title' => 'Incomplete01',
                            'status' => 1,
                            'status_name' => 'INCOMPLETE',
                            'created_at' => '2015-07-01',
                            'updated_at' => '2015-07-01',
                            'deleted_at' => null,
                            ],
                           ];

    const COMPLETED_STATUS_NAME = 'completedStatusName';

    public $completedStatusName = [
                          [
                           'title' => 'Completed02',
                           'status' => 2,
                           'status_name' => 'COMPLETED',
                           'created_at' => '2015-07-02',
                           'updated_at' => '2015-07-02',
                           'deleted_at' => null,
                           ],
                          [
                           'title' => 'Completed01',
                           'status' => 2,
                           'status_name' => 'COMPLETED',
                           'created_at' => '2015-07-01',
                           'updated_at' => '2015-07-01',
                           'deleted_at' => null,
                           ],
                          ];
}
