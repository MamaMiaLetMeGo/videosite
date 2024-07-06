<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\HomeController;

// Public routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('posts', PostController::class);

// Authentication routes
Auth::routes();

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::resource('videos', VideoController::class);
});