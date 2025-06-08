<template>
    <div>
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
            {{ currencyData.currencyName }} Currency Data
        </h1>
        <div class="text-gray-900">
            {{ currencyData.description }}
        </div>
    </div>
</template>
<script setup lang="ts">
type DetailedCurrencyData = {
    currencyId: string,
    currencyName: string,
    symbol: string,
    description: string,
};

let currencyData: DetailedCurrencyData = {
    currencyId: 'bitcoin',
    currencyName: 'Bitcoin',
    symbol: 'BTC',
    description: 'Bitcoin was the first major cryptocurrency.'
};
</script>