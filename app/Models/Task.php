<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = ['id', 'title', 'description', 'deadline', 'created_id', 'assigned_id', 'status_id', 'note'];

    public function createdid()
    {
        return $this->belongsTo(User::class, 'created_id');
    }
    public function assignedid()
    {
        return $this->belongsTo(User::class, 'assigned_id');
    }
    public function status()
    {
        return $this->belongsTo(Task_Status::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'task_follower', 'task_id', 'user_id');
    }
}
