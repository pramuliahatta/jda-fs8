<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\File;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/services', [FileController::class, 'index'])->name('services');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/articles', function () {
    return view('articles.index');
})->name('articles');

Route::get('/articles/{article}', function () {
    return view('articles.detail');
})->name('articles.detail');

Route::prefix('dashboard')->group (function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

    Route::get('/articles', function () {
        return view('dashboard.articles.index');
    })->name('dashboard.articles.index');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('dashboard.gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('dashboard.gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('dashboard.gallery.store');
    Route::get('/gallery/detail/{id}', [GalleryController::class, 'show'])->name('dashboard.gallery.detail');
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('dashboard.gallery.edit');
    Route::post('/gallery/edit/{id}', [GalleryController::class, 'update'])->name('dashboard.gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('dashboard.gallery.delete');

    Route::get('/articles/create', function () {
        return view('dashboard.articles.create');
    })->name('dashboard.articles.create');

    Route::get('/articles/{id}', function () {
        return view('dashboard.articles.show');
    })->name('dashboard.articles.show');

    Route::get('/articles/{id}/edit/', function () {
        return view('dashboard.articles.edit');
    })->name('dashboard.articles.edit');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('dashboard.gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('dashboard.gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('dashboard.gallery.store');
    Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('dashboard.gallery.show');
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('dashboard.gallery.edit');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('dashboard.gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('dashboard.gallery.destroy');

    Route::get('/forms', function () {
        return view('dashboard.forms.index');
    })->name('dashboard.forms.index');

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

    Route::get('/products', function () {
        return view('dashboard.products.index');
    })->name('dashboard.products.index');

    Route::get('/products/{id}/edit/', function () {
        return view('dashboard.products.edit');
    })->name('dashboard.products.edit');

    Route::get('/products/{id}', function () {
        return view('dashboard.products.show');
    })->name('dashboard.products.show');

});


Route::prefix('products')->group (function () {
    Route::get('/', [ProductController::class, 'index'])->name('products');

    Route::get('/dashboard', function () {
        return view('products.dashboard');
    })->name('products.dashboard');

    Route::get('/create', function () {
        return view('products.create');
    })->name('products.create');

    Route::get('/{product}', [ProductController::class, 'show'])->name('products.detail');

    Route::get('/{id}/edit', function () {
        return view('products.edit');
    })->name('products.edit');

    Route::get('/show/{id}', function () {
        return view('products.show');
    })->name('products.show');
});


    Route::get('/about', function () {
        return view('about.index');
    })->name('about');

   