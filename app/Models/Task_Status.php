<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_Status extends Model
{
    use HasFactory;
    protected $table = 'task_status';
    protected $fillable = ['id', 'name'];

}
