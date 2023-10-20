<?php

namespace App\Providers;

use App\Repositories\PostRepository;
use App\Repositories\EloquentPostRepository;
use App\Repositories\CommentRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class PostRepositoryProvider extends ServiceProvider
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
        $this->app->singleton(PostRepository::class, function(Application $app) {
            return new EloquentPostRepository($app->make(CommentRepository::class));
        });
    }
}
