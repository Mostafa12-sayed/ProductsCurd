<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
   return to_route('products.index');
});

Route::get('/products/export', [ProductController::class, 'export'])->name('products.export');

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
