<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CheckoutController;


Route::get('/', [HomeControler::class, 'index'])->name('home.page');


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
        Route::post('/ashboard-slider', [AdminController::class, 'uploadSlider'])->name('slider.upload');

        Route::get('dashboard-addbook-page', [BookController::class, 'index'])->name('books.page');
        Route::post('dashboard-addbook', [BookController::class, 'store'])->name('books.store');
        Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
        Route::put('/books/update', [BookController::class, 'update'])->name('book.update');
        Route::delete('dashboard-deletebook/{id}', [BookController::class, 'destroy'])->name('book.delete');

        Route::get('/dashboard.show-category', [CategoryController::class, 'create'])->name('categories.show');
        Route::delete('/dashboard.delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
        Route::post('/dashboard.add-category', [CategoryController::class, 'store'])->name('categories.store');


        Route::get('dashboard-author', [AdminController::class, 'showauthor'])->name('showauthor');
        Route::post('dashboard-add-author', [AdminController::class, 'authorsstore'])->name('authors.store');
        Route::delete('dashboard-destroy-author/{id}', [AdminController::class, 'authorsdestroy'])->name('authors.destroy');


        Route::get('dashboard-translator', [AdminController::class, 'showtranslator'])->name('showtranslators');
        Route::post('dashboard-add-translator', [AdminController::class, 'translatorstore'])->name('translators.store');
        Route::delete('dashboard-destroy-translator/{id}', [AdminController::class, 'translatordestroy'])->name('translators.destroy');


        Route::get('dashboard-publisher', [AdminController::class, 'showpublisher'])->name('showpublishers');
        Route::post('dashboard-add-publisher', [AdminController::class, 'publisherstore'])->name('publishers.store');
        Route::delete('dashboard-destroy-publisher/{id}', [AdminController::class, 'publisherdestroy'])->name('publishers.destroy');

        Route::get('/dashboard-factor', [AdminController::class, 'showOrders'])->name('factor.show');
    });
});


Route::prefix('user')->group(function () {
    Route::middleware('user')->group(function () {
        Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
        Route::put('dashboard-user-update', [UserController::class, 'update'])->name('user.update');
    });
});

Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/books', [BookController::class, 'filter'])->name('books.filter');
Route::get('/book/{id}', [BookController::class, 'show1'])->name('show.book');
Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show');

Route::get('/payment', [CartController::class, 'payment'])->name('payment');
Route::post('/payment/complete', [CartController::class, 'completePayment'])->name('payment.complete');


Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout');



Route::post('/comments/{id}', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/pending', [CommentController::class, 'pendingComments'])->name('admin.comments.pending');
Route::patch('/comments/{id}/approve', [CommentController::class, 'approve'])->name('admin.comments.approve');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('admin.comments.destroy');



Route::get('/author/{id}', [HomeControler::class, 'show_author'])->name('author.show');
Route::get('/translator/{id}', [HomeControler::class, 'show_translator'])->name('translator.show');
Route::get('/publisher/{id}', [HomeControler::class, 'show_publisher'])->name('publisher.show');


// 1001 section
Route::get('1001books',[HomeControler::class,'show1001'])->name('1001books');

Route::get('aboutus', function () {
    return view('template.abuotus');
})->name('aboutus');

Route::get('contactus', function () {
    return view('template.contactus');
})->name('contactus');


