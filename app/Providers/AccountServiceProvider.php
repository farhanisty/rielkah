<?php

namespace App\Providers;

use App\Repositories\FollowManagementRepository;
use App\Services\AccountService;
use App\Services\AccountServiceImpl;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class AccountServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(AccountService::class, function(Application $app) {
            return new AccountServiceImpl($app->make(FollowManagementRepository::class));
        });
    }
}
