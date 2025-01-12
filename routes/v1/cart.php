<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::controller(CartController::class)->group(function(){
    
    Route::get('cart/{id}','index');   // نشان دادن سبد خرید یوزر
    Route::post('cart','add'); // افزودن محصول به سبد
    Route::delete('cart/item/{userid}/{itemId}/{quantity}', 'remove'); // حذف آیتم
    Route::delete('cart/clear/{userid}','clear'); // پاک کردن کل سبد

});









