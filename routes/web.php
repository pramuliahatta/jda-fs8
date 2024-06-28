<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckUserIsAdmin;
use App\Models\Product;

// Public Routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

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

    Route::get('/articles', [ArticleController::class, 'index'])->name('dashboard.articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('dashboard.articles.create');
    Route::post('/articles/create', [ArticleController::class, 'store'])->name('dashboard.articles.store');
    Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('dashboard.articles.show');
    Route::get('/articles/{id}/edit/', [ArticleController::class, 'edit'])->name('dashboard.articles.edit');
    Route::post('/articles/{id}/edit/', [ArticleController::class, 'update'])->name('dashboard.articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('dashboard.articles.destroy');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('dashboard.gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('dashboard.gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('dashboard.gallery.store');
    Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('dashboard.gallery.show');
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('dashboard.gallery.edit');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('dashboard.gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('dashboard.gallery.destroy');

    Route::get('/forms', [FileController::class, 'index'])->name('dashboard.forms.index');
    Route::get('/forms/create', [FileController::class, 'create'])->name('dashboard.forms.create');
    Route::get('/forms/{id}/edit', [FileController::class, 'edit'])->name('dashboard.forms.edit');
    Route::post('/forms/create', [FileController::class, 'store'])->name('dashboard.forms.store');
    Route::get('/forms/{id}', [FileController::class, 'show'])->name('dashboard.forms.show');
    Route::post('/forms/edit/{id}', [FileController::class, 'update'])->name('dashboard.forms.update');
    Route::delete('/forms/{id}', [FileController::class, 'destroy'])->name('dashboard.forms.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('dashboard.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('dashboard.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('dashboard.users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('dashboard.users.show');
    Route::get('/users/{user}/edit/', [UserController::class, 'edit'])->name('dashboard.users.edit');
    Route::post('/users/{user}', [UserController::class, 'update'])->name('dashboard.users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroys');

    Route::get('/products', [ProductController::class, 'index'])->name('dashboard.products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('dashboard.products.show');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('dashboard.products.destroy');
});
