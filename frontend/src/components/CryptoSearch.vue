<template>
    <div class="flex flex-col my-2">
        <label class="text-gray-700 " for="search-input">
            {{ label }}
        </label>
        <input id="search-input" v-model="currentInput" type="text"
            class="sm:max-w-60 shadow border p-1 rounded-bl rounded-tl" placeholder="Name or Symbol..."
            @blur="onBlur();" @input="onInput" />
        <div class="">
            <div v-if="searchResults.length !== 0 || currentInput.length"
                class="gap-2 max-h-1/4 bg-gray-100 sm:max-w-60 overflow-y-scroll w-full z-10 absolute">
                <div v-if="searchResults.length === 0">No results</div>
                <NuxtLink v-for="result in searchResults" :key="result.id"
                    class="m-1 rounded hover:bg-gray-50 w-full block" :to="`/currency/${result.id}`">
                    {{ result.name }}
                </NuxtLink>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import { ref, type Ref, reactive } from 'vue';;
let currentInput = ref("");
let searchResults = reactive([]);
const onInput = async () => {
    searchResults = [];
    if (currentInput.value.length >= 3) {
        await updateResultsList();
    }
};

type SearchResult = {
    id: string,
    name: string,
};

let responseStatus: Ref<number> = ref(200);

let label: Ref<string> = computed(() => (responseStatus.value === 429 ? "Rate limit exceeded. Please try again shortly." : "Search for Crypto By Name Or Symbol"));

const onBlur = () => {
    setTimeout(() => {
        searchResults = [];
        currentInput.value = '';
    }, 150);
};
const updateResultsList = async () => {
    const url = `https://api.coingecko.com/api/v3/search?query=${encodeURIComponent(currentInput.value)}`;
    try {
        const res = await fetch(url);
        responseStatus.value = res.status;
        const data: { coins: Array<SearchResult> } = await res.json();

        searchResults = data.coins;
    } catch {
        searchResults = [];
    }
};

</script>