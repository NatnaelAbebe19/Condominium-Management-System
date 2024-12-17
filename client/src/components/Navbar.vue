<script setup>
import { RouterLink } from 'vue-router';
import { useAuthStore } from "@/stores/auth";
import { ref } from 'vue';

const authStore = useAuthStore();
console.log("Guest: ", authStore.user);
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
            <RouterLink :to="{ name: 'welcome' }">
                <h2 class=" text-green-700 text-3xl font-bold">Kombolcha CMS</h2>
            </RouterLink>
        </div>

        <ul class="lg:flex flex-col lg:flex-row lg:items-center lg:mx-auto lg:space-x-8 xl:space-x-16">

            <li
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <RouterLink :to="{ name: 'welcome' }">Home</RouterLink>
            </li>

            <li
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <RouterLink :to="{ name: 'rentals' }">Rentals</RouterLink>
            </li>

            <li
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <RouterLink :to="{ name: 'contact' }">Contact</RouterLink>
            </li>

            <li
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <RouterLink :to="{ name: 'about' }">About</RouterLink>
            </li>
        </ul>

        <div class="flex gap-x-4 ">
            <RouterLink :to="{ name: 'login' }"
                class="px-5 py-3 lg:block border-2 border-green-700 rounded-lg bg-green-700 font-semibold hover:text-green-700 text-lg hover:bg-white text-white transition ease-linear duration-500">
                Login
            </RouterLink>
            <RouterLink :to="{ name: 'register' }"
                class="px-5 py-3 lg:block border-2 border-green-700 rounded-lg font-semibold text-green-700 text-lg hover:bg-green-700 hover:text-white transition ease-linear duration-500">
                Register
            </RouterLink>
        </div>

    </nav>
</template>
