<?php

namespace App\Providers;

use App\Repositories\FollowManagementRepository;
use App\Repositories\EloquentFollowManagementRepository;
use Illuminate\Support\ServiceProvider;

class FollowManagementRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(FollowManagementRepository::class, EloquentFollowManagementRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
