<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class,
        );
        $this->app->bind(
            \App\Repositories\Task\TaskRepositoryInterface::class,
            \App\Repositories\Task\TaskRepository::class,
        );
        $this->app->bind(
            \App\Repositories\TaskStatus\TaskStatusRepositoryInterface::class,
            \App\Repositories\TaskStatus\TaskStatusRepository::class,
        );
        $this->app->bind(
            \App\Repositories\TaskFollower\TaskFollowerRepositoryInterface::class,
            \App\Repositories\TaskFollower\TaskFollowerRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
