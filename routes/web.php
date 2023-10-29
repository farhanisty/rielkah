<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/search', [SearchController::class, 'index'])->name('search.index');
    Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'showEdit'])->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'postEdit'])->name('profile.post.edit');

    Route::get('/follow/{id}', [FollowController::class, 'follow'])->name('follow');
    Route::get('/unfollow/{id}', [FollowController::class, 'unfollow'])->name('unfollow');

    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
    Route::post('/post', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');

    Route::post('/comment/{post_id}', [CommentController::class, 'store'])->name('comment.store');
});


Route::prefix('auth')->group(function() {
    Route::middleware('must.not.logged')->group(function() {
        Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
        Route::post('/register', [RegisterController::class, 'register']);
        Route::get('/login', [LoginController::class, 'index'])->name('login.index');
        Route::post('/login', [LoginController::class, 'login']);
    });
    
    Route::get('/logout', [LoginController::class, 'logout'])->middleware(['auth'])->name('logout');
});
