<script setup>
import { ref } from "vue";
const isSideOpen = ref(false);
import Logo from "@/assets/image/Logo.png";
import AdminLargeSideBar from "@/Components/Admin/AdminLargeSideBar.vue";
import { useAuthStore } from "@/stores/auth";

const authStore = useAuthStore();

const toggleSideBar = () => {
    isSideOpen.value = !isSideOpen.value;
};
</script>

<template>
    <div class="grid h-screen w-full grid-cols-10 overflow-y-hidden bg-bg-tan font-DMSans lg:flex">
        <AdminLargeSideBar />

        <div class="inside col-span-10 w-full overflow-auto md:col-span-7">
            <!-- heading -->
            <div class="border-y border-gray-400">
                <div class="hidden items-center justify-center px-4 py-5 md:flex">
                    <h1 class="text-2xl text-center font-Montserrat text-bg-dark-green xl:text-3xl font-bold">
                        Admin Dashboard
                    </h1>
                </div>
            </div>
            <div class="pt-3 pl-3 w-full">
                <slot />
            </div>
        </div>
    </div>
</template>