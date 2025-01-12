<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::controller(ContactController::class)->group(function(){

Route::post('contact/', 'index'); //add
Route::get('contact/', 'show'); //show
Route::get('articles/', 'showarticles'); //showarticles
}); 