<?php

namespace App\Providers;

use App\Repositories\EloquentCommentRepository;
use App\Repositories\CommentRepository;
use Illuminate\Support\ServiceProvider;

class CommentRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CommentRepository::class, EloquentCommentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
