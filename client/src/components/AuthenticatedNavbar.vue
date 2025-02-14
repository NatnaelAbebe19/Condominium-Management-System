<script setup>
import { RouterLink } from 'vue-router';
import { useAuthStore } from "@/stores/auth";
import { ref, reactive, onMounted } from 'vue';
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import axios from 'axios';
import Logo from "@/assets/image/Logo.png"

const authStore = useAuthStore();
console.log('role: ', authStore.user.role);
const isDropdownOpen = ref(false);
const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};

const unreadCount = ref(0);

onMounted(async () => {
    try {
        const response = await axios.get('/api/notifications/unread-count', {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
        });
        unreadCount.value = response.data.unread_count;
    } catch (error) {
        console.error('Error fetching unread notifications count:', error);
    }
});
async function markAsRead() {
    try {
        await axios.post('/api/notifications/mark-as-read', {}, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
        });
        unreadCount.value = 0;
    } catch (error) {
        console.error('Error marking notifications as read:', error);
    }
}
const HandleLogout = () => {
    authStore.logout();
}
const state = reactive({
    Featuresactive: false,
});
</script>

<template>
    <nav class="flex-wrap lg:flex items-center py-14 xl:relative z-10 border-b-2">

        <div class="flex items-center justify-between mb-10 lg:mb-0 mr-60">
            <RouterLink :to="{ name: 'home' }">
                <div class="logo absolute left-5 top-10">
                    <img :src="Logo" alt="FetaNa Logo" class="w-[150px]" />
                </div>
            </RouterLink>
        </div>

        <ul class="lg:flex flex-col lg:flex-row lg:items-center lg:mx-auto lg:space-x-8 xl:space-x-16">
            <li
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <RouterLink :to="{ name: 'home' }">Home</RouterLink>
            </li>
            <li
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <div v-if="authStore.user.role === 'renter'" class="">
                    <Menu as="div" class="relative inline-block text-left">
                        <div>
                            <MenuButton
                                class="inline-flex w-full items-center gap-x-1 justify-center rounded-md py-2 text-lg    ">
                                Rentals
                                <svg v-if="state.Featuresactive" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    width="15" height="15" viewBox="0 0 30 30">
                                    <path
                                        d="M27,18v2c0,0.386-0.223,0.738-0.572,0.904c-0.349,0.166-0.762,0.115-1.062-0.13L15,12.292L4.633,20.774 c-0.299,0.245-0.712,0.295-1.062,0.13C3.221,20.739,3,20.386,3,20v-2c0-0.3,0.135-0.584,0.367-0.774l11-9 c0.369-0.301,0.898-0.301,1.267,0l11,9C26.865,17.416,27,17.7,27,18z">
                                    </path>
                                </svg>
                                <svg v-else xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15"
                                    viewBox="0 0 30 30">
                                    <path
                                        d="M3,12v-2c0-0.386,0.223-0.738,0.572-0.904s0.762-0.115,1.062,0.13L15,17.708l10.367-8.482 c0.299-0.245,0.712-0.295,1.062-0.13C26.779,9.261,27,9.614,27,10v2c0,0.3-0.135,0.584-0.367,0.774l-11,9 c-0.369,0.301-0.898,0.301-1.267,0l-11-9C3.135,12.584,3,12.3,3,12z">
                                    </path>
                                </svg>
                            </MenuButton>
                        </div>

                        <transition enter-active-class="transition duration-100 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-75 ease-in"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0">
                            <MenuItems
                                class="absolute -right-8 mt-2 w-36 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none">
                                <div class="px-1 py-1">
                                    <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'rentalsView' }" :class="[
                                        active ? 'bg-green-700 text-white' : 'text-gray-900',
                                        'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                    ]">
                                        My Rentals
                                    </RouterLink>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                    <RouterLink :to="{ name: 'rentPost' }" :class="[
                                        active ? 'bg-green-700 text-white' : 'text-gray-900',
                                        'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                    ]">
                                        Post Property
                                    </RouterLink>
                                    </MenuItem>
                                </div>

                            </MenuItems>
                        </transition>
                    </Menu>
                </div>
                <div v-else>
                    <RouterLink :to="{ name: 'rentals' }">Rentals</RouterLink>
                </div>
            </li>
            <li
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <RouterLink :to="{ name: 'authcontact' }">Contact</RouterLink>
            </li>

            <li
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <RouterLink :to="{ name: 'authabout' }">About</RouterLink>
            </li>
            <li v-if="authStore.user.role === 'renter'"
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <div class="relative">
                    <RouterLink to="/notifications" @click="markAsRead">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                        <span v-if="unreadCount > 0"
                            class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-600 rounded-full"></span>
                        <span v-if="unreadCount > 0"
                            class="absolute top-0 right-0 mt-1 mr-1 text-xs text-white bg-red-600 rounded-full px-1">{{
                                unreadCount }}</span>
                    </RouterLink>
                </div>
            </li>

            <li v-else
                class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
                <a href="mailto:minwyelet@gmail.com">Support</a>
            </li>
        </ul>
        <div class="flex items-center gap-x-4 cursor-pointer">
            <h1 class="font-semibold" @click="toggleDropdown">{{ authStore.user.name }}</h1>
            <div class="cursor-pointer md:block rounded-full bg-green-700 p-3" @click="toggleDropdown">
                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="#ffffff"
                        d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z" />
                </svg>
            </div>
            <div v-if="isDropdownOpen" class="absolute -right-20 top-24 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                <ul>
                    <li class="px-4 py-2 hover:bg-slate-200 cursor-pointer" @click="HandleLogout">Log Out</li>
                </ul>
            </div>
        </div>
    </nav>
</template>