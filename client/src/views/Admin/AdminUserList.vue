<script setup>
import AdminLayout from '@/Layout/AdminLayout.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue'
const users = ref([]);
const router = useRouter();
const isOpen = ref(false)

onMounted(async () => {
    try {
        const response = await axios.get('/api/users', {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
        });
        users.value = response.data.data.filter(user => user.role !== 'admin');
    } catch (error) {
        console.error('Error fetching users:', error);
    }
});



const handleDelete = async (userId) => {
    if (confirm('Are you sure you want to delete this user?')) {
        try {
            await axios.delete(`/api/users/${userId}`, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`,
                },
            });
            users.value = users.value.filter(user => user.id !== userId);
        } catch (error) {
            console.error('Error deleting user:', error);
        }
    }
};
</script>

<template>
    <AdminLayout>
        <div class="py-8">
            <h1 class="text-3xl font-bold mb-4">List of Users</h1>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 text-left">ID</th>
                        <th class="py-2 text-left">Name</th>
                        <th class="py-2 text-left">Email</th>
                        <th class="py-2 text-left">Role</th>
                        <th class="py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id" class="border-b-2 border-green-700">
                        <td class="py-2">{{ user.id }}</td>
                        <td class="py-2">{{ user.name }}</td>
                        <td class="py-2">{{ user.email }}</td>
                        <td class="py-2">{{ user.role }}</td>
                        <td class="py-2">
                            <button @click="handleDelete(user.id)"
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