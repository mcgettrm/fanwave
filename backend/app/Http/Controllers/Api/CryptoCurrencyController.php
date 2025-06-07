<?php

namespace App\Http\Controllers\Api;

class CryptoCurrencyController
{
    public function index(string $order='ASC', int $limit = 10) {

    }

    public function get(int $id){
        return response()->json([

        ]);
    }
}
