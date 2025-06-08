<template>
    <table class="text-sm sm:text-base border border-gray-300 bg-gray-100 table-auto text-center w-full max-w-full">
        <thead>
            <tr>
                <th class="sm:p-1 border-b border-gray-300">Rank</th>
                <th class="sm:p-1 border-b border-gray-300">ID</th>
                <th class="sm:p-1 border-b border-gray-300">Name</th>
                <th class="sm:p-1 border-b border-gray-300">Market Cap</th>
                <th class="sm:p-1 border-b border-gray-300">Details</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in currencyData" :key="index">
                <td class="border-b border-gray-300 hover:bg-gray-50">{{ item.rank }}</td>
                <td class="border-b border-gray-300 hover:bg-gray-50">{{ item.currencyId }}</td>
                <td class="border-b border-gray-300 hover:bg-gray-50">{{ item.currencyName }}</td>
                <td class="border-b border-gray-300 hover:bg-gray-50">{{ formatCurrency(item.marketCap) }}</td>
                <td class="py-1 pr-1 sm:p-1 border-b border-gray-300">
                    <NuxtLink class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
                        :to="`/currency/${item.currencyId}`">
                        More
                    </NuxtLink>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script setup lang="ts">
import type { CurrencyDataSummary } from '~/types/currency-data-summary';
defineProps<{
    currencyData: Array<CurrencyDataSummary>
}>();

const formatCurrency = (value: number) => {
    return new Intl.NumberFormat('en-GB', {
        style: 'currency',
        currency: 'GBP',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(value);
};
</script>