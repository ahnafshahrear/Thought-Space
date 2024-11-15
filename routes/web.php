<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'posts');
 
Route::resource('posts', PostController::class);

Route::get('/search', [PostController::class, 'search'])->name('posts.search');

Route::get('/{user}/posts', [DashboardController::class, 'posts'])->name('posts.user');

Route::middleware('auth')->group(function () { 
    Route::get('/dashboard', action: [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 
});

Route::middleware('guest')->group(function () { 
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});