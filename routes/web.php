<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::post('/addproduct', [ProductController::class, 'addProduct'])->name('add.product');
Route::post('/updateproduct', [ProductController::class, 'updateProduct'])->name('update.product');
Route::post('/deleteproduct', [ProductController::class, 'deleteProduct'])->name('delete.product');
Route::get('/paginate/paginate-data', [ProductController::class, 'paginateProduct']);
Route::get('/search-product', [ProductController::class, 'searchProduct'])->name('search.product');
