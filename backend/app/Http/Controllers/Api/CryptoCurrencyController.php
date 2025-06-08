<?php

namespace App\Http\Controllers\Api;

use App\Adaptors\CoinGeckoAdaptor;

class CryptoCurrencyController
{

    public function __construct(private CoinGeckoAdaptor $coinGeckoAdaptor){

    }


    //TODO::DRY?
    public function index(string $order='ASC', int $limit = 10): \Illuminate\Http\JsonResponse {

        //TODO::Pagination? Need to check API params
        //Empty array response
        $returnData = [];
        $statusCode = 404;
        try {
            $returnData = $this->coinGeckoAdaptor->getTopTen();
            $statusCode = 200;
        } catch(\Exception $e) {
            //TODO::Logging? Observability?
            echo $e->getMessage();
        }

        //TODO::Do I need to set the respose content type header here?
        return response()->json(
            $returnData
        )->setStatusCode($statusCode);
    }

    public function get(string $currencyId): \Illuminate\Http\JsonResponse {
        //TODO::Validation? Can it be done in the router?

        //Generate an empty object response
        $returnData = (object)[];
        $statusCode = 404;
        try {
            $returnData = $this->coinGeckoAdaptor->getCurrencyDataById($currencyId);
            $statusCode = 200;
        } catch(\Exception $e) {
            //TODO::Logging? Observability?
            echo $e->getMessage();
        }

        //TODO::Do I need to set the response content type header here?
        return response()->json(
            $returnData
        )->setStatusCode($statusCode);

    }
}
