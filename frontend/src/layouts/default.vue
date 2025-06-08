<template>
    <div class="min-h-screen flex flex-col">
        <Header />
        <main class="flex-1">
            <slot />
        </main>
        <Footer />
    </div>
</template>

<script lang="ts" setup>
import Header from '~/components/SiteHeader.vue';
import Footer from '~/components/SiteFooter.vue';

</script>

<style scoped>
main {
    padding: 1rem;
}
</style>