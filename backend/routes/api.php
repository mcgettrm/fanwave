<?php

use Illuminate\Support\Facades\Route;

Route::get('/summary',[\App\Http\Controllers\Api\CryptoCurrencyController::class,'index']);
Route::get('/currency-data/{currencyId}',[\App\Http\Controllers\Api\CryptoCurrencyController::class,'get']);
