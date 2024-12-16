<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;

Route::get('/', function () {
    return view('home');
});
Route::get('home', [HomeControler::class, 'index'])->name('home.page');


Route::get('login-form', [LoginController::class, 'index'])->name('login-form');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', action: [LoginController::class, 'logout'])->name('logout');

Route::get('signup-form', [SignupController::class, 'index'])->name('signup-form');
Route::post('signup', [SignupController::class, 'signup'])->name('signup');


Route::prefix('admin')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });
});

Route::prefix('user')->group(function () {
    Route::middleware('user')->group(function () {
        Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    });
});
