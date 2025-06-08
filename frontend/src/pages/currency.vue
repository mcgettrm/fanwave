<template>
    <div>
        <h1 class="mb-1 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
            {{ currencyData.currencyName }} Currency Data
        </h1>
        <h2 class="text-gray-500 mb-4">
            Ticker: <span class="font-bold">{{ currencyData.symbol }} </span>
            |
            ID: <span class="font-bold">{{ currencyData.currencyId }}</span>
        </h2>
        <div class="text-gray-900">
            {{ currencyData.description }}
        </div>
    </div>
</template>
<script setup lang="ts">
import type { DetailedCurrencyData } from '~/types/detailed-currency-data';
let currencyData: DetailedCurrencyData = {
    currencyId: 'bitcoin',
    currencyName: 'Bitcoin',
    symbol: 'BTC',
    description: 'Bitcoin was the first major cryptocurrency.'
};

useHead({
    title: `${currencyData.symbol} Detail`,
})
</script>