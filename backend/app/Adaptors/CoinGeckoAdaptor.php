<?php

namespace App\Adaptors;

use App\Models\CurrencyDataSummary;
use App\Models\DetailedCurrencyDataItem;
use Illuminate\Support\Facades\Http;

class CoinGeckoAdaptor implements CryptoAdapterInterface
{

    private CONST COIN_GECKO_BASE_URL = 'https://api.coingecko.com/api/v3';
    private CONST MARKET_CAP_ENDPOINT = '/coins/markets?vs_currency=GBP';
    private CONST DETAILS_ENDPOINT = '/coins/{currency_id}?vs_currency=GBP';

    public function __construct(private string $coinGeckoAPIKey = '')
    {

    }

    /**
     * @return array<CurrencyDataSummary>
     */
    public function getTopTen(): array{

        $response = $this->sendRequest(self::MARKET_CAP_ENDPOINT . "&page=1&per_page=10");
        if($response->status() !== 200){
            //TODO:: Logging
            return [];
        }
        $dataArray = $response->json();
        $responseArray = [];

        foreach($dataArray as $item){
            $summary = new CurrencyDataSummary();
            $summary->currencyId = $item['id'] ?? 0;
            $summary->marketCap = $item['market_cap'] ?? 0;
            $summary->rank = $item['market_cap_rank'] ?? 0;
            $summary->currencyName = $item['name'] ?? 'Item not found';
            $responseArray[] = $summary;
        }

        return $responseArray;
    }

    public function getCurrencyDataById(string $currencyId): ?DetailedCurrencyDataItem {
        $response = $this->sendRequest(str_replace('{currency_id}',$currencyId, self::DETAILS_ENDPOINT));
        if($response->status() !== 200) {
            //TODO:: Logging
            return null;
        }
        $data = $response->json();
        $currency = new DetailedCurrencyDataItem();
        $currency->currencyName = $data['name'];
        $currency->currencyId = $data['id'];
        $currency->description = $data['description']['en'];
        $currency->symbol = $data['symbol'];

        return $currency;
    }

    private function sendRequest(string $path): \Illuminate\Http\Client\Response {

        if($this->coinGeckoAPIKey){
            Http::withHeaders(['x-cg-pro-api-key'=>$this->coinGeckoAPIKey]);
        }

         return Http::get(self::COIN_GECKO_BASE_URL."{$path}");
    }
}
