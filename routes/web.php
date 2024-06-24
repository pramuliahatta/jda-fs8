<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/services', function () {
    return view('form.formuser');
})->name('services');

Route::get('/products', function () {
    return view('products.index');
})->name('products');

Route::get('/products/{id}', function () {
    return view('products.detail');
})->name('productsDetail');



Route::get('/gallery', function () {
    return view('gallery.index');
})->name('gallery');

Route::get('/articles', function () {
    return view('articles.index');
})->name('articles');

Route::get('/articles/{id}', function () {
    return view('articles.detail');
})->name('articlesDetail');

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

    Route::get('/articles', function () {
        return view('dashboard.articles.index');
    })->name('dashboard.articles.index');

    Route::get('/gallery', function () {
        return view('dashboard.gallery.index');
    })->name('dashboard.gallery.index');

    Route::get('/forms', function () {
        return view('dashboard.forms.index');
    })->name('dashboard.forms.index');

    Route::get('/users', function () {
        return view('dashboard.users.index');
    })->name('dashboard.users.index');

});

Route::get('/createproducts', function () {
    return view('products.create');
})->name('productsCreate');

Route::get('/dashboardproducts', function () {
    return view('products.dashboard');
})->name('productsDashboard');

Route::get('/editproducts', function () {
    return view('products.edit');
})->name('productsEdit');

Route::get('/previewproducts', function () {
    return view('products.preview');
})->name('productsPreview');


Route::get('/about', function () {
    return view('about.index');
})->name('about');

// Route::prefix('products')->group(function () {
//     Route::get('/', function () {
//         return view('products.index');
//     })->name('product.index');

//     Route::get('/{id}', function () {
//         return view('products.detail');
//     })->name('product.details');

//     Route::get('/create', function () {
//         return view('products.create');
//     })->name('product.create');

//     Route::get('/edit', function () {
//         return view('products.edit');
//     })->name('product.edit');

// });





