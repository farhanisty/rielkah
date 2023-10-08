<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FollowController;
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

    Route::get('/follow/{id}', [FollowController::class, 'follow'])->name('follow');
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
