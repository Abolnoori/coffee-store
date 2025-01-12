<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function(){
Route::get('users', 'index');
Route::post('users', 'store');
Route::get('users/{id}', 'show');
Route::put('users/{user}', 'update');
Route::patch('users/{user}', 'update');
Route::delete('users/{id}', 'destroy');
});
