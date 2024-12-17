<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CategoryController;

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
        Route::post('add-admin', [AdminController::class, 'addAdmin'])->name('admin.addadmin');
        Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
        Route::put('/admin/update', [AdminController::class, 'adminupdate'])->name('admin.update');
        Route::post('/dashboard-adduser', [AdminController::class, 'adduser'])->name('admin.adduser');
        Route::delete('/dashboard-deleteuser/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');
        Route::get('/ashboard-show-slider', [AdminController::class, 'showSliderManagement'])->name('show-slider');
        Route::delete('/ashboard-delete-slider/{id}', [AdminController::class, 'deleteSlider'])->name('slider.delete');
        Route::post('/ashboard-slider', [AdminController::class, 'uploadSlider'])->name('admin.slider.upload');

        Route::get('dashboard-addbook-page', [BookController::class, 'index'])->name('books.page');
        Route::post('dashboard-addbook', [BookController::class, 'store'])->name('books.store');
        Route::delete('dashboard-deletebook//{id}', [BookController::class, 'destroy'])->name('book.delete');

        Route::get('/dashboard.show-category', [CategoryController::class, 'create'])->name('categories.show');
        Route::delete('/dashboard.delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
        Route::post('/dashboard.add-category', [CategoryController::class, 'store'])->name('categories.store');
    });
});

Route::prefix('user')->group(function () {
    Route::middleware('user')->group(function () {
        Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    });
});
