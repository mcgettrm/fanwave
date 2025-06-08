<?php

namespace App\Adaptors;

use App\Models\CurrencyDataSummary;
use App\Models\DetailedCurrencyDataItem;
use Illuminate\Support\Facades\Http;

class CoinGeckoAdaptor implements \CryptoAdapterInterface
{

    private CONST COIN_GECKO_BASE_URL = 'https://api.coingecko.com/api/v3';
    private CONST MARKET_CAP_ENDPOINT = '/coins/markets';
    private CONST DETAILS_ENDPOINT = '/coins/{id}';

    public function __construct(private string $coinGeckoAPIKey = '')
    {

    }

    /**
     * @return array<CurrencyDataSummary>
     */
    public function getTopTen(): array{

        $response = $this->sendRequest(self::MARKET_CAP_ENDPOINT);
        return [
            new CurrencyDataSummary(),
            new CurrencyDataSummary(),
            new CurrencyDataSummary()
        ];
    }

    public function getCurrencyDataById(int $currencyId): DetailedCurrencyDataItem {

        $response = $this->sendRequest(self::DETAILS_ENDPOINT);
        return new DetailedCurrencyDataItem();
    }

    private function sendRequest(string $path): \Illuminate\Http\Client\Response {

        $headers = [];

        if($this->coinGeckoAPIKey){
            $headers['x-cg-pro-api-key'] = $this->coinGeckoAPIKey;
        }
         return Http::get(self::COIN_GECKO_BASE_URL."{$path}", $headers);
    }
}
