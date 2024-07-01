<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckUserIsAdmin;

// Public Routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about.index');
})->name('about');

Route::get('/services', [FileController::class, 'index'])->name('services');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.detail');
//Dashboard User(Seller)
Route::resource('/seller/products', ProductController::class)->middleware(['auth'])->except('update');
Route::post('/seller/products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.detail');

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');

//Dashboard Routes
Route::middleware(['auth', CheckUserIsAdmin::class])->prefix('dashboard')->group(function () {

    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

    Route::resource('/articles', ArticleController::class, ['names'=> 'dashboard.articles'])->except('update');
    Route::post('/articles/{id}', [ArticleController::class, 'update'])->name('dashboard.articles.update');

    Route::resource('/forms', FileController::class, ['names'=> 'dashboard.forms'])->except('update');
    Route::post('/forms/{id}', [FileController::class, 'update'])->name('dashboard.forms.update');

    Route::resource('/gallery', GalleryController::class, ['names'=> 'dashboard.gallery'])->except('update');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('dashboard.gallery.update');

    Route::resource('/users', UserController::class, ['names'=> 'dashboard.users'])->except('update');
    Route::post('/users/{user}', [UserController::class, 'update'])->name('dashboard.users.update');

    Route::resource('/products', ProductController::class, ['names'=> 'dashboard.products'])->only(['index', 'show', 'destroy']);

});
