<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/login', 'auth.login');
Route::view('/form', 'form.formuser');
Route::view('/products', 'products.index');
Route::view('/details', 'products.detail');

Route::get('/articles', function () {
    return view('articles.index');
})->name('articles');

Route::get('/articles/{id}', function () {
    return view('articles.detail');
})->name('articlesDetail');