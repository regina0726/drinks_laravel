<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\DrinkTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// FIGYELEM: jelenleg nincs bejelentkezés, ezért az írási műveletek (létrehozás,
// módosítás, törlés) bárki számára elérhetők. Ha telepíted a hitelesítést
// (pl. laravel/breeze), tedd őket `auth` middleware mögé, például:
//   Route::resource('drinktypes', DrinkTypeController::class)->except(['index', 'show'])->middleware('auth');
//   Route::resource('drinktypes', DrinkTypeController::class)->only(['index', 'show']);
Route::resource('drinktypes', DrinkTypeController::class);
Route::resource('brands', BrandController::class);
