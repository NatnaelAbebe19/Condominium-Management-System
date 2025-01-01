<script setup>
import AdminLayout from '@/Layout/AdminLayout.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const rentals = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/api/rentals', {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
        });
        rentals.value = response.data.data;
    } catch (error) {
        console.error('Error fetching rentals:', error);
    }
});

const handleDelete = async (rentalId) => {
    if (confirm('Are you sure you want to delete this rental?')) {
        try {
            await axios.delete(`/api/rentals/${rentalId}`, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`,
                },
            });
            rentals.value = rentals.value.filter(rental => rental.id !== rentalId);
        } catch (error) {
            console.error('Error deleting rental:', error);
        }
    }
};
</script>

<template>
    <AdminLayout>
        <div class="py-8">
            <h1 class="text-3xl font-bold mb-4">List of Rentals</h1>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 text-left">ID</th>
                        <th class="py-2 text-left">Location</th>
                        <th class="py-2 text-left">Bedrooms</th>
                        <th class="py-2 text-left">Price(ETB)</th>
                        <th class="py-2 text-left">Status</th>
                        <th class="py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="rental in rentals" :key="rental.id" class="border-b-2 border-green-700">
                        <td class="py-2">{{ rental.id }}</td>
                        <td class="py-2">{{ rental.location }}</td>
                        <td class="py-2">{{ rental.bedrooms }}</td>
                        <td class="py-2">{{ rental.price }}</td>
                        <td class="py-2">{{ rental.status }}</td>
                        <td class="py-2">
                            <button @click="handleDelete(rental.id)"
                                class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>

<style scoped>
/* Add your styles here */
</style>