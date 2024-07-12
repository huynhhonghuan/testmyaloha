<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $model;
    
    public function __construct(User $model)
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
        $model = $this->find($id);
        if ($model) {
            $model->update($data);
            return $model;
        }
        return null;
    }
    public function delete($id)
    {
        $model = $this->find($id);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }
}
