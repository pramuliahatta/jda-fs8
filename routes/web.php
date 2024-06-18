<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/files', [FileController::class, 'index']);
