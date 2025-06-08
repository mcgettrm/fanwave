<template>
    <h1 class="text-2xl sm:text-4xl text-center mb-4 font-bold">Crypto Tracker</h1>
    <div v-if="pending">Loading...</div>
    <!-- TODO:: Don't show error data in prod -->
    <div v-else-if="data">
        <p>Welcome to CryptoTracker. Check out the biggest crypto currencies by market cap below and click through to
            see extra details. </p>
        <CryptoSearch />
        <MarketCapTable :currency-data="data"></MarketCapTable>
    </div>
    <div v-else>
        Something went wrong, we couldn't load the market data. Please try again later. {{ error }}
    </div>
</template>
<script setup lang="ts">
import CryptoSearch from '~/components/CryptoSearch.vue';
import type { CurrencyDataSummary } from '~/types/currency-data-summary';
useHead({
    title: 'Top Ten'
})

const secondLevelDomain = process.server
    ? `backend:80`
    : `localhost:8000`;

const route = useRoute();

const { data, pending, error } = await useAsyncData<Array<CurrencyDataSummary>>(
    'summaryData', () => $fetch(`http://${secondLevelDomain}/api/summary`),
    {
        watch: [() => route.fullPath],
    }
);
</script>