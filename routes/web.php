<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    if (!Auth::check()) {
        return view('welcome');
    } else {
        return redirect()->route('home');
    }
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Post Routes
Route::resource('posts', PostController::class);
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
