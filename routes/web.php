<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeControler::class,'index'])->name('home.page');
