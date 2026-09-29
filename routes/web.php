<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\DrinkTypeController;
use Illuminate\Support\Facades\Route;

Route::resource('drinktypes', DrinkTypeController::class);
Route::resource('brands', BrandController::class);
