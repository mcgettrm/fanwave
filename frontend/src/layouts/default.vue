<template>
    <div>
        <Header />
        <main>
            <slot />
        </main>
        <Footer />
    </div>
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