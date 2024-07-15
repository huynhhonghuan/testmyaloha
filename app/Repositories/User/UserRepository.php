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
        return $this->model->all();
    }
    public function paginate($perPage)
    {
        return $this->model->paginate($perPage);
    }
    public function dataexcept($role_id)
    {
        return $this->model->where('role_id', '!=', $role_id)->get();
    }
    public function userStatus($status)
    {
        return $this->model->where('status', $status)->get();
    }
}
