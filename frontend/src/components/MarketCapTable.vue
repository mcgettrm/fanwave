<template>
    <table class="min-w-full border border-gray-300 bg-gray-100">
        <thhead>
            <tr>
                <th class="px-4 py-2 text-left border-b border-gray-300">Rank</th>
                <th class="px-4 py-2 text-left border-b border-gray-300">ID</th>
                <th class="px-4 py-2 text-left border-b border-gray-300">Name</th>
                <th class="px-4 py-2 text-left border-b border-gray-300">Market Cap</th>
                <th class="px-4 py-2 text-left border-b border-gray-300">Details</th>
            </tr>
        </thhead>
        <tbody>
            <tr v-for="(item, index) in cryptoData" :key="index">
                <td class="px-4 py-2 border-b border-gray-300 hover:bg-gray-50">{{ item.rank }}</td>
                <td class="px-4 py-2 border-b border-gray-300 hover:bg-gray-50">{{ item.currencyId }}</td>
                <td class="px-4 py-2 border-b border-gray-300 hover:bg-gray-50">{{ item.currencyName }}</td>
                <td class="px-4 py-2 border-b border-gray-300 hover:bg-gray-50">{{ `£${item.marketCap}` }}</td>
                <td>
                    <NuxtLink :to="{ name: 'currency', params: { currencyId: item.currencyId } }"></NuxtLink>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script setup lang="ts">
type CurrencyDataSummary = {
    currencyId: string,
    currencyName: string,
    marketCap: number,
    rank: number,
}

let cryptoData: Array<CurrencyDataSummary> = [];
</script>