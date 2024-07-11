<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_Follower extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'task_id', 'user_id'];
}
