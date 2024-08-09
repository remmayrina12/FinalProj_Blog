<?php
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('blogs', BlogController::class);
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/home', [BlogController::class, 'home'])->name('home');



Route::get('/home', [BlogController::class, 'home'])->name('home');
Route::get('/dashboard', [BlogController::class, 'index'])->name('dashboard');


Route::get('/home', [HomeController::class, 'index'])->name('home');


use App\Http\Controllers\AdminController;
Route::get('/home', [BlogController::class, 'homePage'])->name('home');



Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
