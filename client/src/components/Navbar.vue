<script setup>
import { RouterLink } from 'vue-router';
import { useAuthStore } from "@/stores/auth";
import { ref } from 'vue';

const authStore = useAuthStore();
console.log(authStore.user);
const isDropdownOpen = ref(false);
const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};
const HandleLogout = () => {
    authStore.logout();
}
</script>

<template>
    <nav class="flex-wrap lg:flex items-center py-14 xl:relative z-10 border-b-2">

        <div class="flex items-center justify-between mb-10 lg:mb-0">
            <RouterLink to="/">
                <h2 class=" text-green-700 text-3xl font-bold">Kombolcha CMS</h2>
            </RouterLink>
        </div>

        <ul class="lg:flex flex-col lg:flex-row lg:items-center lg:mx-auto lg:space-x-8 xl:space-x-16">

            <li
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <RouterLink :to="{ name: 'home' }">Home</RouterLink>
            </li>

            <li
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <RouterLink :to="{ name: 'register' }">Rentals</RouterLink>
            </li>

            <li
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <RouterLink href="#">Contact</RouterLink>
            </li>

            <li
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <RouterLink :to="{ name: 'about' }">About</RouterLink>
            </li>
        </ul>

        <div class="flex gap-x-4 " v-if="!authStore.user">
            <RouterLink :to="{ name: 'login' }"
                class="px-5 py-3 lg:block border-2 border-green-700 rounded-lg bg-green-700 font-semibold hover:text-green-700 text-lg hover:bg-white text-white transition ease-linear duration-500">
                Login
            </RouterLink>
            <RouterLink :to="{ name: 'register' }"
                class="px-5 py-3 lg:block border-2 border-green-700 rounded-lg font-semibold text-green-700 text-lg hover:bg-green-700 hover:text-white transition ease-linear duration-500">
                Register
            </RouterLink>
        </div>
        <div class="flex items-center gap-x-4 cursor-pointer" v-else>
            <h1 class="font-semibold" @click="toggleDropdown">{{ authStore.user.name }}</h1>
            <div class="cursor-pointer md:block rounded-full bg-green-700 p-3" @click="toggleDropdown">
                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="#ffffff"
                        d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z" />
                </svg>
            </div>
            <div v-if="isDropdownOpen" class="absolute -right-20 top-24 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                <ul>
                    <li class="px-4 py-2 hover:bg-red-100 cursor-pointer" @click="HandleLogout">Log Out</li>
                </ul>
            </div>
        </div>
    </nav>
</template>
