<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskFollowerController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// ----------------------------------------------------------------
Route::resource('user', UserController::class);

// ----------------------------------------------------------------
Route::resource('task', TaskController::class);
Route::resource('taskstatus', TaskStatusController::class);
