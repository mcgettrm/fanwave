<template>

    <body class="min-h-screen flex flex-col">
        <Header />
        <main class="min-h-screen flex flex-col">
            <slot />
        </main>
        <Footer />
    </body>

</template>

<script lang="ts" setup>
// You can import components, composables, etc.
import Header from '~/components/SiteHeader.vue'
import Footer from '~/components/SiteFooter.vue'
</script>

<style scoped>
main {
    padding: 1rem;
}
</style>