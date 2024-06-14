<?php

use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\GalleryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResources([
    "galleries" => GalleryController::class,
    "files" => FileController::class,
]);
