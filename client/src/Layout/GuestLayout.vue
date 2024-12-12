<script setup>
import Footer from '@/components/Footer.vue';
import Navbar from '@/components/Navbar.vue';

</script>

<template>
    <section class="bg-white">

        <div class="container max-w-screen-xl mx-auto px-4 flex flex-col">
            <Navbar />
            <div class="flex-1">
                <slot />
            </div>
            <div class="mt-auto">
                <Footer />
            </div>
        </div>
    </section>
</template>