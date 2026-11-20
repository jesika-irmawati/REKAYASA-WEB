<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;

// Kode ini yang memunculkan halaman utama bawaan Laravel saat membuka 127.0.0.1:8000
Route::get('/', function () {
    return view('welcome');
});

// Kode ini yang membuat Anda bisa mengakses /products, /stocks, dan /transactions
Route::resource('products', ProductController::class);
Route::resource('stocks', StockController::class);
Route::resource('transactions', TransactionController::class);