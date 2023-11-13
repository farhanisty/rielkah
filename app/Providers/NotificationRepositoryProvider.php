<?php

namespace App\Providers;

use App\Repositories\NotificationRepository;
use App\Repositories\EloquentNotificationRepository;
use Illuminate\Support\ServiceProvider;

class NotificationRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(NotificationRepository::class, EloquentNotificationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
