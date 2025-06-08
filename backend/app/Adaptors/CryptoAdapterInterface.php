<?php

use App\Models\CurrencyDataSummary;
use App\Models\DetailedCurrencyDataItem;

interface CryptoAdapterInterface {
    public function getCurrencyDataById(int $id): DetailedCurrencyDataItem;

    /**
     * TODO:: Use strategy pattern for Top10 by e.g: MarketCap, TradeVolume, TodaysPriceMovement
     * @return array<CurrencyDataSummary>
     */
    public function getTopTen(): array;
}
