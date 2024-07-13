<?php

namespace App\Repositories\TaskFollower;

use App\Models\Task;
use App\Models\Task_Follower;

class TaskFollowerRepository implements TaskFollowerRepositoryInterface
{
    protected $model;

    public function __construct(Task_Follower $model)
    {
        $this->model = $model;
    }

    public function create($task_id, $data)
    {
        $check = true;
        if ($data)
            foreach ($data as $d) {
                if (!$this->model->create([
                    'task_id' => $task_id,
                    'user_id' => $d,
                ])) {
                    $check = false;
                };
            }
        else
            $check = false;
        return $check;
    }

    public function delete($task_id)
    {
        return $this->model->where('task_id', $task_id)->delete();
    }
}
