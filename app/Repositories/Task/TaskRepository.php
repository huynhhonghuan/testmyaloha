<?php

namespace App\Repositories\Task;

use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    protected $model;

    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    public function all()
    {
        return $this->model->paginate(10);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {

        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $task = $this->model->find($id);
        if ($task) {
            $task->update($data);
            return $task;
        }
        return null;
    }

    public function delete($id)
    {
        $task = $this->model->find($id);
        if ($task) {
            return $task->delete();
        }
        return false;
    }
}
