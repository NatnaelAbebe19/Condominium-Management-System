<script setup>
import AdminLayout from "@/Layout/AdminLayout.vue";
import { onMounted, ref } from "vue";
import axios from "axios";
import { Doughnut } from 'vue-chartjs';
import { Chart as ChartJS, ArcElement, CategoryScale, LinearScale, Title, Tooltip, Legend } from 'chart.js';

ChartJS.register(ArcElement, CategoryScale, LinearScale, Title, Tooltip, Legend);

const rentals = ref([]);
const users = ref([]);
const rentalCount = ref(0);
const userCount = ref(0);
const userRoles = ref({ user: 0, renter: 0 });
const rentalStatuses = ref({ available: 0, reserved: 0, maintenance: 0 });

onMounted(async () => {
    try {
        const rentalResponse = await axios.get("/api/rentals", {
            headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`,
            },
        });
        rentals.value = rentalResponse.data.data;
        rentalCount.value = rentals.value.length;

        rentalStatuses.value = {
            available: rentals.value.filter(rental => rental.status === 'available').length,
            reserved: rentals.value.filter(rental => rental.status === 'reserved').length,
            maintenance: rentals.value.filter(rental => rental.status === 'maintenance').length,
        };

        const userResponse = await axios.get("/api/users", {
            headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`,
            },
        });
        users.value = userResponse.data.data;
        userCount.value = users.value.length;

        userRoles.value = {
            user: users.value.filter(user => user.role === 'user').length,
            renter: users.value.filter(user => user.role === 'renter').length,
        };
    } catch (error) {
        console.error("Error fetching data:", error);
    }
});

</script>

<template>
    <AdminLayout>
        <div class="py-8">
            <h1 class="text-bg-light-green font-bold text-3xl sm:text-4xl md:text-5xl">
                System Status
            </h1>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Available Rentals</h2>
                    <div class="flex gap-x-4 items-center">
                        <svg class="size-7 fill-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                        </svg>

                        <p class="text-2xl font-semibold">{{ rentalCount }}</p>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Total Users</h2>
                    <div class="flex gap-x-4">
                        <svg class="size-7 fill-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path
                                d="M64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16l80 0 0-64c0-26.5 21.5-48 48-48s48 21.5 48 48l0 64 80 0c8.8 0 16-7.2 16-16l0-384c0-8.8-7.2-16-16-16L64 48zM0 64C0 28.7 28.7 0 64 0L320 0c35.3 0 64 28.7 64 64l0 384c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm88 40c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16l0 48c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-48zM232 88l48 0c8.8 0 16 7.2 16 16l0 48c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-48c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16l0 48c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-48zm144-16l48 0c8.8 0 16 7.2 16 16l0 48c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-48c0-8.8 7.2-16 16-16z" />
                        </svg>

                        <p class="text-2xl font-semibold">{{ userCount }}</p>
                    </div>
                </div>
            </div>
            <div class="flex gap-x-16 items-center">
                <div class="mt-8 w-[350px] h-[350px]">
                    <h2 class="text-2xl font-bold mb-4">User Roles</h2>
                    <Doughnut :data="{
                        labels: ['user', 'renter'],
                        datasets: [{
                            label: 'User Roles',
                            data: [userRoles.user, userRoles.renter],
                            backgroundColor: ['#42A5F5', '#66BB6A'],
                        }]
                    }" :options="{ responsive: true, maintainAspectRatio: false }" />
                </div>
                <div class="mt-8 w-[350px] h-[350px]">
                    <h2 class="text-2xl font-bold mb-4">Rental Statuses</h2>
                    <Doughnut :data="{
                        labels: ['available', 'reserved', 'maintenance'],
                        datasets: [{
                            label: 'Rental Statuses',
                            data: [rentalStatuses.available, rentalStatuses.reserved, rentalStatuses.maintenance],
                            backgroundColor: ['#42A5F5', '#FFA726', '#FF7043'],
                        }]
                    }" :options="{ responsive: true, maintainAspectRatio: false }" />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>