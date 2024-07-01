<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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
