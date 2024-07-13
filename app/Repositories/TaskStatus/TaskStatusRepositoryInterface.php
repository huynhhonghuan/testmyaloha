<?php

namespace App\Repositories\TaskStatus;

interface TaskStatusRepositoryInterface
{
    public function all();
    public function paginate($perPage);
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
