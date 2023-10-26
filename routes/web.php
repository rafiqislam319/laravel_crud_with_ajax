<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::post('/addproduct', [ProductController::class, 'addProduct'])->name('add.product');
