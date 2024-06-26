<?php


use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResources([
    "galleries" => GalleryController::class,
    "files" => FileController::class,
    "articles" => ArticleController::class,
    "products" => ProductController::class,
    "users" => UserController::class
]);

// Route::post("/galleries/edit/{id}", [GalleryController::class, "update"]);
