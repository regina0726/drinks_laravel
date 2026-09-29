<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DrinkTypeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('drinktypes', DrinkTypeController::class);
Route::resource('brands', BrandController::class);