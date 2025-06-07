<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        '/summary'=>'For a list of the 10 largest cryptocurrencies ordered by market cap',
        '/currency-data/{currencyId}'=>'Retrieve detailed data about a specific cryptocurrency'
    ], 200);
});
Route::get('/summary',[\App\Http\Controllers\Api\CryptoCurrencyController::class,'index']);
Route::get('/currency-data/{currencyId}',[\App\Http\Controllers\Api\CryptoCurrencyController::class,'get']);
