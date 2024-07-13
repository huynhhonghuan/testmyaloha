<?php

namespace App\Repositories\TaskFollower;

interface TaskFollowerRepositoryInterface
{
    // public function all();
    // public function find($id);
    public function create($task_id,array $data);
    // public function update($id, array $data);
    public function delete($id);
}
