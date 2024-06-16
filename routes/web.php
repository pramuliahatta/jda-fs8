<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard/users', function () {
    return view('welcome');
})->name('dashboard.users.index');

Route::get('/dashboard', function () {
    return view('welcome');
})->name('dashboard.index');

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('login.auth');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/products', function () {
    return view('products.index');
})->name('products.index');

Route::get('/products/{product}', function () {
    return view('products.detail');
})->name('products.show');

Route::get('/dashboard/users', function () {
    return view('welcome');
})->name('dashboard.users.index');