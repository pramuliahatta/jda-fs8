<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/services', function () {
    return view('form.formuser');
})->name('services');

Route::get('/products', function () {
    return view('products.index');
})->name('products');

Route::get('/products/{id}', function () {
    return view('products.detail');
})->name('products.detail');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/articles', function () {
    return view('articles.index');
})->name('articles');

Route::get('/articles/{id}', function () {
    return view('articles.detail');
})->name('articles.detail');

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

    Route::get('/articles', function () {
        return view('dashboard.articles.index');
    })->name('dashboard.articles.index');

    Route::get('/articles/create', function () {
        return view('dashboard.articles.create');
    })->name('dashboard.articles.create');

    Route::get('/articles/edit/{id}', function () {
        return view('dashboard.articles.edit');
    })->name('dashboard.articles.edit');

    Route::get('/articles/{id}', function () {
        return view('dashboard.articles.detail');
    })->name('dashboard.articles.detail');

    Route::get('/gallery', function () {
        return view('dashboard.gallery.index');
    })->name('dashboard.gallery.index');

    Route::get('/forms', function () {
        return view('dashboard.forms.index');
    })->name('dashboard.forms.index');

    Route::get('/users', function () {
        return view('dashboard.users.index');
    })->name('dashboard.users.index');
});
