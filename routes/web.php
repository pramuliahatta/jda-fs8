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

Route::get('/articles', function () {
    return view('articles.index');
})->name('articles.index');

Route::get('/articles/{article}', function () {
    return view('articles.detail');
})->name('articles.detail');


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

    Route::get('/forms', [FileController::class, 'index'])->name('dashboard.forms.index');
    Route::get('/forms/create', [FileController::class, 'create'])->name('dashboard.forms.create');
    Route::post('/forms/create', [FileController::class, 'store'])->name('dashboard.forms.store');
    Route::get('/forms/{id}', [FileController::class, 'show'])->name('dashboard.forms.show');
    Route::get('/forms/edit/{id}', [FileController::class, 'edit'])->name('dashboard.forms.edit');
    Route::post('/forms/edit/{id}', [FileController::class, 'update'])->name('dashboard.forms.update');
    Route::delete('/forms/{id}', [GalleryController::class, 'destroy'])->name('dashboard.forms.destroy');


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

    Route::get('/users/{user}', [UserController::class, 'show'])->name('dashboard.users.show');

    Route::get('/users/{user}/edit/', [UserController::class, 'edit'])->name('dashboard.users.edit');
    Route::post('/users/{user}', [UserController::class, 'update'])->name('dashboard.users.update');

    Route::get('/product', [ProductController::class, 'index'])->name('dashboard.products.index');
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('dashboard.products.show');

    Route::get('/products', [ProductController::class, 'index'])->name('products.dashboard');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.stores');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.preview');
    Route::post('/products/{product}', [ProductController::class, 'update'])->name('products.updates');

    
   

})->middleware('auth');

