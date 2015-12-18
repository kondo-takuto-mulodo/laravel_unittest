<?php
namespace Tests\Mocks;

use App\Models\TodoModelInterface;
use App\Services\TodoService;
use Tests\Mocks\AbstractMock;

class TodoModelMock extends AbstractMock implements TodoModelInterface
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

    public function getByStatus($status)
    {
        $todos = array();
        if ($status == TodoService::STATUS_INCOMPLETE) {
            $todos = $this->incomplete;
        } elseif ($status == TodoService::STATUS_COMPLETED) {
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
