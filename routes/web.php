<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/login', 'auth.login')->name('login');
Route::view('/form', 'form.formuser');
Route::view('/products', 'products.index');
Route::view('/details', 'products.detail');
