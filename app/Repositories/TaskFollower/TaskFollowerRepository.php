<?php

namespace App\Repositories\TaskFollower;

use App\Models\Task_Follower;

class TaskFollowerRepository implements TaskFollowerRepositoryInterface
{
    protected $model;

    public function __construct(Task_Follower $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function delete($task_id)
    {
        return $this->model->where('task_id', $task_id)->delete();
    }
}
