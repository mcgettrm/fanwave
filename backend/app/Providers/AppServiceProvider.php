<?php

namespace App\Providers;

use App\Adaptors\CoinGeckoAdaptor;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CoinGeckoAdaptor::class, function ($app) {
            return new CoinGeckoAdaptor(env('COIN_GECKO_API_KEY'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
