<?php

namespace App\Providers;

use App\Repositories\PostRepository;
use App\Repositories\EloquentPostRepository;
use Illuminate\Support\ServiceProvider;


class PostRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PostRepository::class, EloquentPostRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
