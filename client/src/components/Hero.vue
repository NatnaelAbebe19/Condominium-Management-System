<script setup>
import { RouterLink } from 'vue-router';
import { useAuthStore } from "@/stores/auth";
import home from "../../src/assets/image/home-img.png"
const authStore = useAuthStore();
console.log(authStore.user);
</script>

<template>
    <div class="flex items-center justify-center xl:justify-start h-[80vh]">
        <div class="-mt-72 text-center xl:text-left">
            <h1 class="font-semibold text-4xl md:text-6xl lg:text-7xl text-gray-900 leading-normal mb-6">Get your dream
                <br> house now
            </h1>
            <p class="font-normal text-xl text-gray-400 leading-relaxed mb-12">Having a sweet home is everyone's dream.
                Have you <br> owned your dream house?</p>
            <div class="flex gap-x-4">
                <RouterLink :to="{ name: 'register' }"
                    class="px-6 py-4 bg-green-700 text-white font-semibold text-lg rounded-xl hover:bg-green-900 transition ease-in-out duration-500">
                    Get Started
                </RouterLink>
                <RouterLink :to="{ name: 'rentals' }"
                    class="px-6 py-4 border-2 border-green-700 text-green-700 font-semibold text-lg rounded-xl hover:bg-slate-200 transition ease-in-out duration-500">
                    View Rentals</RouterLink>
            </div>
        </div>
        <div class="hidden xl:block xl:absolute z-0 top-0 right-0">
            <img :src="home" alt="Home img">
        </div>
    </div>
</template>