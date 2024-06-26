<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about.index');
})->name('about');

Route::get('/services', [FileController::class, 'index'])->name('services');

Route::get('/products', [ProductController::class, 'index'])->name('products');



Route::get('/products/{product}', function () {
    return view('products.detail');
})->name('productsDetail');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.detail');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.detail');

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('dashboard')->group(function () {
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
    Route::get('/gallery/detail/{id}', [GalleryController::class, 'show'])->name('dashboard.gallery.detail');
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('dashboard.gallery.edit');
    Route::post('/gallery/edit/{id}', [GalleryController::class, 'update'])->name('dashboard.gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('dashboard.gallery.delete');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('dashboard.gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('dashboard.gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('dashboard.gallery.store');
    Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('dashboard.gallery.show');
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('dashboard.gallery.edit');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('dashboard.gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('dashboard.gallery.destroy');

    // Route::get('/forms', [FileController::class, 'index'])->name('dashboard.forms.index');
    Route::get('/forms', function () {
        return view('dashboard.forms.index');
    })->name('dashboard.forms.index');
    Route::get('/forms/create', [FileController::class, 'create'])->name('dashboard.forms.create');
    Route::post('/forms/create', [FileController::class, 'store'])->name('dashboard.forms.store');
    Route::get('/forms/{id}', [FileController::class, 'show'])->name('dashboard.forms.show');
    Route::get('/forms/edit/{id}', [FileController::class, 'edit'])->name('dashboard.forms.edit');
    Route::post('/forms/edit/{id}', [FileController::class, 'update'])->name('dashboard.forms.update');
    Route::delete('/forms/{id}', [FileController::class, 'destroy'])->name('dashboard.forms.destroy');


    Route::get('/users', function () {
        return view('dashboard.users.index');
    })->name('dashboard.users.index');


    Route::get('/users/create', function () {
        return view('dashboard.users.create');
    })->name('dashboard.users.create');

    Route::get('/users/{id}', function () {
        return view('dashboard.users.show');
    })->name('dashboard.users.show');

    Route::get('/users/{id}/edit/', function () {
        return view('dashboard.users.edit');
    })->name('dashboard.users.edit');


    Route::get('/users', [UserController::class, 'index'])->name('dashboard.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('dashboard.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('dashboard.users.store');

    Route::get('/users/{user}', [UserController::class, 'show'])->name('dashboard.users.show');
    Route::get('/users/{user}/edit/', [UserController::class, 'edit'])->name('dashboard.users.edit');
    Route::post('/users/{user}', [UserController::class, 'update'])->name('dashboard.users.update');

    Route::get('/products', [ProductController::class, 'index'])->name('products.dashboard');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.stores');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.preview');
    Route::post('/products/{product}', [ProductController::class, 'update'])->name('products.updates');

    Route::get('/about', function () {
        return view('about.index');
    })->name('about');
})->middleware('auth');
