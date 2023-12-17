<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleDetailController;


Route::get('/', [ProductController::class, 'dashboard']);
Route::resource('/products', ProductController::class);
Route::get('/sales', [SaleDetailController::class, 'index']);
Route::get('/products/{id}/edit', [ProductController::class, 'edit']);

