<script setup>
import GuestLayout from '@/Layout/GuestLayout.vue';
import { RouterLink } from 'vue-router';
import { useAuthStore } from "@/stores/auth";
import { storeToRefs } from "pinia";
import { onMounted, reactive } from "vue";
const authStore = useAuthStore();
const { errors } = storeToRefs(useAuthStore());
const formData = reactive({
    email: "",
    password: "",
});
const submitForm = () => {
    authStore.authenticate("login", formData);
};


</script>

<template>
    <GuestLayout>
        <form @submit.prevent="submitForm"
            class="max-w-md mx-auto mt-20 mb-60 shadow-lg px-12 py-20 rounded-lg space-y-8">
            <h1 class="text-green-700 text-xl font-bold mb-6">Login to Kombolcha CMS</h1>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                <input type="email" id="email" v-model="formData.email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="name@gmail.com" required />
                <p v-if="errors.email" class="text-sm text-red-500">
                    {{ errors.email }}
                </p>
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">password</label>
                <input type="password" id="password" v-model="formData.password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required />
                <p v-if="errors.password" class="text-sm text-red-500">
                    {{ errors.password[0] }}
                </p>
            </div>
            <RouterLink to="/register">
                <p
                    class="text-right underline text-sm pt-4 hover:text-blue-600 transition-all ease-in-out duration-300">
                    Don't have an account</p>
            </RouterLink>
            <button type="submit"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full px-10 py-2.5 text-center transition-all ease-in-out">Login</button>

        </form>

    </GuestLayout>
</template>