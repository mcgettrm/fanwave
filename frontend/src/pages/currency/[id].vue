<template>
    <div>
        <div v-if="pending">
            Loading currency data...
        </div>
        <div v-else-if="data">
            <h1 class="mb-1 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                {{ data.currencyName }} Currency Data
            </h1>
            <h2 class="text-gray-500 mb-4">
                Ticker: <span class="font-bold">{{ data.symbol }} </span>
                |
                ID: <span class="font-bold">{{ data.currencyId }}</span>
            </h2>
            <div class="sm:flex gap-4 max-w-full">
                <div class="text-gray-900 whitespace-pre-wrap min-w-7/10">
                    {{ data.description ?? 'No Description is available' }}
                </div>
                <div class="border border-gray-300 rounded-2xl p-3 text-sm min-w-2/10 gap-2">
                    <h2 class="text-2xl text-center mb-4">Insights</h2>
                    <div>
                        <p>Current Price:</p>
                        <p>{{ data.currentPrice }}</p>
                    </div>
                    <div>
                        <p>Market Capitalisation:</p>
                        <p>{{ data.marketCap }}</p>
                    </div>
                    <div>
                        <p>Volume:</p>
                        <p>{{ data.volume }}</p>
                    </div>

                </div>
            </div>

        </div>
        <div v-else>
            We could not retrieve the currency data for that ticker.
        </div>
    </div>
</template>
<script setup lang="ts">
import type { DetailedCurrencyData } from '~/types/detailed-currency-data';
let route = useRoute();
let currencyId = route.params.id;
useHead({
    title: `${currencyId} Detail`,
});

const secondLevelDomain = process.server
    ? `backend:80`
    : `localhost:8000`;

const { data, pending, error } = await useAsyncData<DetailedCurrencyData>('currencyData', () => $fetch(`http://${secondLevelDomain}/api/currency-data/${currencyId}`));
</script>