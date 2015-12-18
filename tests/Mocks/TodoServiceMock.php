<?php
namespace Tests\Mocks;

use App\Services\TodoServiceInterface;
use Tests\Mocks\AbstractMock;

class TodoServiceMock extends AbstractMock implements TodoServiceInterface
{
    private $incomplete = [
                           [
                            'title' => 'Incomplete02',
                            'status' => self::STATUS_INCOMPLETE,
                            'created_at' => '2015-07-02',
                            'updated_at' => '2015-07-02',
                            'deleted_at' => null,
                            'status_name' => 'INCOMPLETE',
                        ],
                           [
                            'title' => 'Incomplete01',
                            'status' => self::STATUS_INCOMPLETE,
                            'created_at' => '2015-07-01',
                            'updated_at' => '2015-07-01',
                            'deleted_at' => null,
                            'status_name' => 'INCOMPLETE',
                            ],
                           ];

    private $completed = [
                          [
                           'title' => 'Completed02',
                           'status' => self::STATUS_COMPLETED,
                           'created_at' => '2015-07-02',
                           'updated_at' => '2015-07-02',
                           'deleted_at' => null,
                           'status_name' => 'COMPLETED',
                           ],
                          [
                           'title' => 'Completed01',
                           'status' => self::STATUS_COMPLETED,
                           'created_at' => '2015-07-01',
                           'updated_at' => '2015-07-01',
                           'deleted_at' => null,
                           'status_name' => 'COMPLETED',
                           ],
                          ];

    private $deleted = [
                        [
                         'title' => 'Deleted02',
                         'status' => self::STATUS_INCOMPLETE,
                         'created_at' => '2015-06-30',
                         'updated_at' => '2015-06-30',
                         'deleted_at' => '2015-07-02',
                         'status_name' => 'DELETED',
                         ],
                        [
                         'title' => 'Deleted01',
                         'status' => self::STATUS_INCOMPLETE,
                         'created_at' => '2015-06-30',
                         'updated_at' => '2015-06-30',
                         'deleted_at' => '2015-07-01',
                         'status_name' => 'DELETED',
                         ],
                        ];

    public function getByStatus($status)
    {
        $todos = array();
        if ($status == self::STATUS_INCOMPLETE) {
            $todos = $this->incomplete;
        } elseif ($status == self::STATUS_COMPLETED) {
            $todos = $this->completed;
        }
        $this->arrayToObject($todos);
        return (array)$todos;
    }
    public function getDeleted()
    {
        $todos = $this->deleted;
        $this->arrayToObject($todos);
        return (array)$todos;
    }
}
