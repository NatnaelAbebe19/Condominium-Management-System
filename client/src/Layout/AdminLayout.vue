<script setup>
import { ref } from "vue";
import Logo from "@/assets/image/Logo.png";
// import AdminLargeSideBar from "@/Components/Admin/AdminLargeSideBar.vue";
import { useAuthStore } from "@/stores/auth";
import { RouterLink } from "vue-router";

const authStore = useAuthStore();

</script>

<template>
    <div class="grid h-screen w-full grid-cols-10 overflow-y bg-bg-tan font-DMSans lg:flex">
        <!-- <AdminLargeSideBar /> -->
        <div
            class="sidebar lg relative col-span-3 flex-col justify-center rounded-br-[50px] rounded-tr-[50px] bg-green-700 px-4 md:flex lg:w-[330px]">
            <RouterLink :to="{ name: 'adminHome' }">
                <div class="logo absolute left-5 top-10">
                    <img :src="Logo" alt="FetaNa Logo" class="w-[150px]" />
                </div>
            </RouterLink>

            <div class="mb-24 space-y-6">
                <RouterLink :to="{ name: 'adminHome' }" class="flex items-center gap-x-3 text-white">
                    <svg class="size-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path
                            d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                    </svg>
                    <h1 class="cursor-pointer text-xl">Home</h1>
                </RouterLink>
                <RouterLink :to="{ name: 'adminRentalList' }" class="flex items-center gap-x-3 text-white">
                    <svg class="size-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M160 80c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 352c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-352zM0 272c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 160c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48L0 272zM368 96l32 0c26.5 0 48 21.5 48 48l0 288c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48z" />
                    </svg>
                    <h1 class="cursor-pointer text-xl">Rentals</h1>
                </RouterLink>
                <RouterLink :to="{ name: 'adminUserList' }" class="flex items-center gap-x-3 text-white">
                    <svg class="size-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M40 48C26.7 48 16 58.7 16 72l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24L40 48zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L192 64zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zM16 232l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0z" />
                    </svg>
                    <h1 class="cursor-pointer text-xl">Users</h1>
                </RouterLink>
                <RouterLink :to="{ name: 'adminHome' }" class="flex items-center gap-x-3 text-white">
                    <svg class="size-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                            d="M274.9 34.3c-28.1-28.1-73.7-28.1-101.8 0L34.3 173.1c-28.1 28.1-28.1 73.7 0 101.8L173.1 413.7c28.1 28.1 73.7 28.1 101.8 0L413.7 274.9c28.1-28.1 28.1-73.7 0-101.8L274.9 34.3zM200 224a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM96 200a24 24 0 1 1 0 48 24 24 0 1 1 0-48zM224 376a24 24 0 1 1 0-48 24 24 0 1 1 0 48zM352 200a24 24 0 1 1 0 48 24 24 0 1 1 0-48zM224 120a24 24 0 1 1 0-48 24 24 0 1 1 0 48zm96 328c0 35.3 28.7 64 64 64l192 0c35.3 0 64-28.7 64-64l0-192c0-35.3-28.7-64-64-64l-114.3 0c11.6 36 3.1 77-25.4 105.5L320 413.8l0 34.2zM480 328a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                    </svg>

                    <h1 class="cursor-pointer text-xl">Distribution</h1>
                </RouterLink>
                <div class="flex items-center gap-x-3 text-white">
                    <svg class="size-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" />
                    </svg>
                    <h1 class="cursor-pointer text-xl">Notifications</h1>
                </div>
            </div>
            <div class="flex cursor-pointer items-center gap-x-2 text-white">
                <svg class="size-5 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                </svg>
                <div class="">
                    <form @submit.prevent="authStore.logout" class="">
                        <button class="">Log out</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="inside col-span-10 w-full overflow-auto md:col-span-7">
            <!-- heading -->
            <div class="border-y border-gray-400">
                <div class="items-center justify-center px-4 py-5 md:flex">
                    <h1 class="text-2xl text-center font-Montserrat text-bg-dark-green xl:text-3xl font-bold">
                        Admin Dashboard
                    </h1>
                </div>
            </div>
            <div class="pt-3 pl-10 w-full">
                <slot />
            </div>
        </div>
    </div>
</template>