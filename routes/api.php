<?php

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\GalleryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResources([
    "galleries" => GalleryController::class,
    "files" => FileController::class,
    "articles" => ArticleController::class,
]);
