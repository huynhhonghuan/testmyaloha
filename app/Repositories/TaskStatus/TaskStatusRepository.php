<?php

namespace App\Repositories\TaskStatus;

use App\Models\Task_Status;

class TaskStatusRepository implements TaskStatusRepositoryInterface
{
    protected $model;

    public function __construct(Task_Status $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->paginate(10);
    }
    public function find($id)
    {
        return $this->model->find($id);
    }
    public function create($data)
    {
        return $this->model->create($data);
    }
    public function update($id, $data)
    {
        $task_status = $this->model->find($id);
        $task_status->update($data);
        return $task_status;
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
