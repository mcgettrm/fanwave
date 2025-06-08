<template>
    <div v-if="pending">Loading...</div>
    <div v-else-if="error">Something went wrong, we couldn't load the market data. Please try again later. {{ error }}
    </div>
    <div v-else>
        <p>Welcome to CryptoTracker. Check out the biggest crypto currencies by market cap below and click through to
            see extra details. </p>
        <MarketCapTable :currency-data="data"></MarketCapTable>
    </div>
</template>
<script setup lang="ts">
import type { CurrencyDataSummary } from '~/types/currency-data-summary';
useHead({
    title: 'Top Ten'
})

const { data, pending, error } = await useAsyncData<Array<CurrencyDataSummary>>('summaryData', () => $fetch('http://backend:80/api/summary'));
</script>