<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/services', function () {
//     return view('form.formuser');
// })->name('services');
Route::get('/services', [FileController::class, 'index'])->name('services');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.detail');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/articles', function () {
    return view('articles.index');
})->name('articles');

Route::get('/articles/{article}', function () {
    return view('articles.detail');
})->name('articles.detail');

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

    Route::get('/articles', function () {
        return view('dashboard.articles.index');
    })->name('dashboard.articles.index');

    Route::get('/gallery', function () {
        return view('dashboard.gallery.index');
    })->name('dashboard.gallery.index');

    Route::get('/forms', [FileController::class, 'index'])->name('dashboard.forms.index');
    Route::get('/forms/create', [FileController::class, 'create'])->name('dashboard.forms.create');
    Route::get('/forms/{id}/edit', [FileController::class, 'edit'])->name('dashboard.forms.edit');

    Route::get('/users', function () {
        return view('dashboard.users.index');
    })->name('dashboard.users.index');
})
->middleware('auth');
