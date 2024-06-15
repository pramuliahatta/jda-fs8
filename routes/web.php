<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/services', function () {
    return view('form.formuser');
})->name('services');

Route::get('/products', function () {
    return view('products.index');
})->name('products');

Route::get('/products/{id}', function () {
    return view('products.detail');
})->name('productsDetail');


