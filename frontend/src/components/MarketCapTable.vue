<template>
    <table class="border border-gray-300 bg-gray-100 table-auto p-1 text-center">
        <thead>
            <tr>
                <th class="border-b border-gray-300">Rank</th>
                <th class="border-b border-gray-300">ID</th>
                <th class="border-b border-gray-300">Name</th>
                <th class="border-b border-gray-300">Market Cap</th>
                <th class="border-b border-gray-300">Details</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in cryptoData" :key="index">
                <td class="border-b border-gray-300 hover:bg-gray-50">{{ item.rank }}</td>
                <td class="border-b border-gray-300 hover:bg-gray-50">{{ item.currencyId }}</td>
                <td class="border-b border-gray-300 hover:bg-gray-50">{{ item.currencyName }}</td>
                <td class="border-b border-gray-300 hover:bg-gray-50">{{ `£${item.marketCap}` }}</td>
                <td>
                    <NuxtLink class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
                        :to="{ name: 'currency', params: { currencyId: item.currencyId } }">
                        More
                    </NuxtLink>
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

let cryptoData: Array<CurrencyDataSummary> = [{
    currencyId: 'bitcoin',
    currencyName: 'Bitcoin',
    marketCap: 10000,
    rank: 1
}];
</script>