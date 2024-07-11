<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskFollowerController;
use App\Http\Controllers\TaskStatusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::resource('task', TaskController::class);
Route::resource('taskstatus', TaskStatusController::class);
Route::resource('taskfollower', TaskFollowerController::class);
