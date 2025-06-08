<?php

namespace App\Adaptors;

use App\Models\CurrencyDataItem;
use App\Models\CurrencyOverview;

class CoinGeckoAdaptor
{

    private CONST COIN_GECKO_BASE_URL = 'https://api.coingecko.com/api/v3';
    private CONST MARKET_CAP_ENDPOINT = '/coins/markets';
    private CONST DETAILS_ENDPOINT = '/coins/{id}';

    /**
     * @return array<CurrencyDataItem>
     */
    public function getTopTen(): array{
        return [
            new CurrencyDataItem(),
            new CurrencyDataItem(),
            new CurrencyDataItem()
        ];
    }

    public function getCurrencyDataById(int $currencyId): CurrencyOverview {
        return new CurrencyOverview();
    }
}
