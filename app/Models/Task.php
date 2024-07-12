<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = ['id', 'title', 'description', 'deadline', 'user_id', 'status_id', 'note'];
    public function user()
    {
        return $this->belongsTo(User::class);
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
