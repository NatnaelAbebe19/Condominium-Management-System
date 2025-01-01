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
                Admin Dashboard
            </h1>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Available Rentals</h2>
                    <p class="text-2xl font-semibold">{{ rentalCount }}</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Total Users</h2>
                    <p class="text-2xl font-semibold">{{ userCount }}</p>
                </div>
            </div>
            <div class="flex gap-x-16">
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