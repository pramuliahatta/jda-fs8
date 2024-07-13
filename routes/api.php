<?php


use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;
use App\Models\Gallery;
use App\Models\Product;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [UserController::class, 'authenticate']);
// Route::apiResource('articles', ArticleController::class, ['names' => 'api.articles']);
// Route::apiResource('files', FileController::class, ['names'=> 'api.files']);
// Route::apiResource('galleries', GalleryController::class, ['names'=> 'api.galleries']);
// Route::apiResource('products', ProductController::class, ['names'=> 'api.products']);
// Route::apiResource('users', UserController::class, ['names'=> 'api.users']);
Route::apiResource('articles', ArticleController::class, ['names' => 'api.articles'])->except(['index', 'show'])->middleware('auth:sanctum');
Route::apiResource('files', FileController::class, ['names'=> 'api.files'])->except(['index', 'show'])->middleware('auth:sanctum');
Route::apiResource('galleries', GalleryController::class, ['names'=> 'api.galleries'])->except(['index', 'show'])->middleware('auth:sanctum');
Route::apiResource('products', ProductController::class, ['names'=> 'api.products'])->except(['index', 'show'])->middleware('auth:sanctum');
Route::apiResource('users', UserController::class, ['names'=> 'api.users'])->middleware('auth:sanctum');
Route::get('articles', [ArticleController::class,'index'])->name('api.articles.index');
Route::get('articles/{article}', [ArticleController::class,'show'])->name('api.articles.show');
Route::get('files', [FileController::class,'index'])->name('api.files.index');
Route::get('files/{file}', [FileController::class,'show'])->name('api.files.show');
Route::get('galleries', [GalleryController::class,'index'])->name('api.galleries.index');
Route::get('galleries/{gallery}', [GalleryController::class,'show'])->name('api.galleries.show');
Route::get('products', [ProductController::class,'index'])->name('api.products.index');
Route::get('products/{product}', [ProductController::class,'show'])->name('api.products.show');
// Route::get('users', [UserController::class,'index'])->name('api.users.index');
// Route::get('users/{user}', [UserController::class,'show'])->name('api.users.show');

// Route::post("/galleries/edit/{id}", [GalleryController::class, "update"]);
