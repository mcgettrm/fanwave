<?php

namespace App\Adaptors;

use App\Models\CurrencyDataSummary;
use App\Models\DetailedCurrencyDataItem;

class CoinGeckoAdaptor implements \CryptoAdapterInterface
{

    private CONST COIN_GECKO_BASE_URL = 'https://api.coingecko.com/api/v3';
    private CONST MARKET_CAP_ENDPOINT = '/coins/markets';
    private CONST DETAILS_ENDPOINT = '/coins/{id}';

    public function __construct(private string $coinGeckoAPIKey = '')
    {
        if(!$this->coinGeckoAPIKey){
            throw new \Exception('Please provide a CoinGecko API key to the application');
        }
    }

    /**
     * @return array<CurrencyDataSummary>
     */
    public function getTopTen(): array{
        return [
            new CurrencyDataSummary(),
            new CurrencyDataSummary(),
            new CurrencyDataSummary()
        ];
    }

    public function getCurrencyDataById(int $currencyId): DetailedCurrencyDataItem {
        return new DetailedCurrencyDataItem();
    }
}
