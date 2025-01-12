<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)->group(function(){
Route::get('product', 'index');
Route::get('product/{product_id}', 'show');
Route::get('product/category/{category_id}', 'getProductsByCategory');

});