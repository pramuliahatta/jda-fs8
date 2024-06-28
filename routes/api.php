<?php


use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;
use App\Models\Gallery;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('articles', ArticleController::class, ['names' => 'api.articles']);
Route::apiResource('files', FileController::class, ['names'=> 'api.files']);
Route::apiResource('galleries', GalleryController::class, ['names'=> 'api.galleries']);
Route::apiResource('products', ProductController::class, ['names'=> 'api.products']);
Route::apiResource('users', UserController::class, ['names'=> 'api.users']);
Route::post('login', [UserController::class, 'authenticate']);

// Route::post("/galleries/edit/{id}", [GalleryController::class, "update"]);
