<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('task', TaskController::class);
    Route::post('/update-status', [TaskController::class, 'updateStatus'])->name('update.status');
    Route::resource('taskstatus', TaskStatusController::class);
});

require __DIR__ . '/auth.php'; // nhúng tất cả các route ở auth.php

// routes/web.php
Route::get('/test', function () {
    return 'Middleware test passed';
})->middleware('admin');
