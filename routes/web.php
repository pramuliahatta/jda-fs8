<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/login', 'auth.login'); 
Route::view('/form', 'form.formuser'); 
Route::view('/products', 'products.index'); 

