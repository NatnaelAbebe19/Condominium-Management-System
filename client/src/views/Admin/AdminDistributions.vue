<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import AdminLayout from '@/Layout/AdminLayout.vue';

const users = ref([]);
const selectedUser = ref(null);
const isSelecting = ref(false);

onMounted(async () => {
    try {
        const response = await axios.get('/api/users', {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
        });
        users.value = response.data.data.filter(user => user.role !== 'admin' && user.got_lucky === 0);
    } catch (error) {
        console.error('Error fetching users:', error);
    }
});

const selectRandomUser = () => {
    isSelecting.value = true;
    const duration = 5000; // Spin duration in milliseconds
    const spinDegrees = 360 * 5; // Number of degrees to spin (5 full rotations)
    const randomIndex = Math.floor(Math.random() * users.value.length);
    const selectedDegrees = (randomIndex / users.value.length) * 360;

    const wheel = document.querySelector('.wheel');
    wheel.style.transition = `transform ${duration}ms ease-out`;
    wheel.style.transform = `rotate(${spinDegrees + selectedDegrees}deg)`;

    setTimeout(async () => {
        selectedUser.value = users.value[randomIndex];
        isSelecting.value = false;

        // Update the user's got_lucky status
        try {
            await axios.put(`/api/users/${selectedUser.value.id}`, { got_lucky: 1 }, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`,
                },
            });
            selectedUser.value.got_lucky = 1;
            users.value = users.value.filter(user => user.id !== selectedUser.value.id);
        } catch (error) {
            console.error('Error updating user:', error);
        }
    }, duration);
};
</script>

<template>
    <AdminLayout>
        <h3 class="text-3xl text-center my-4 font-bold">Distributions</h3>
        <div class="wheel-container">
            <div class="wheel" v-if="users.length">
                <div v-for="(user) in users" :key="user.id" class="wheel-segment">
                    {{ user.name }}
                </div>
            </div>
        </div>
        <button @click="selectRandomUser" class="bg-green-700 text-white px-4 py-2 rounded mx-auto text-center">Select
            Random
            User</button>
        <table v-if="selectedUser" class="mt-4">
            <thead>
                <tr>
                    <th class="text-left mr-4">ID</th>
                    <th class="text-left mr-4">Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-left mr-4">{{ selectedUser.id }}</td>
                    <td class="text-left">{{ selectedUser.name }}</td>
                </tr>
            </tbody>
        </table>
    </AdminLayout>
</template>

<style scoped>
.wheel-container {
    position: relative;
    width: 200px;
    height: 200px;
    margin: 20px auto;
}

.wheel {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 5px solid #06992b;
    position: relative;
    transform: rotate(0deg);
}

.wheel-segment {
    position: absolute;
    width: 50%;
    height: 50%;
    top: 50%;
    left: 50%;
    transform-origin: 0% 0%;
    text-align: center;
    line-height: 100px;
    overflow: hidden;
}

.wheel-segment:nth-child(odd) {
    background-color: #c0b9b9;
}

.wheel-segment:nth-child(even) {
    background-color: #06992b;
}

.wheel-segment:nth-child(1) {
    transform: rotate(0deg) translate(-100%, -100%);
}

.wheel-segment:nth-child(2) {
    transform: rotate(45deg) translate(-100%, -100%);
}

.wheel-segment:nth-child(3) {
    transform: rotate(90deg) translate(-100%, -100%);
}

.wheel-segment:nth-child(4) {
    transform: rotate(135deg) translate(-100%, -100%);
}

.wheel-segment:nth-child(5) {
    transform: rotate(180deg) translate(-100%, -100%);
}

.wheel-segment:nth-child(6) {
    transform: rotate(225deg) translate(-100%, -100%);
}

.wheel-segment:nth-child(7) {
    transform: rotate(270deg) translate(-100%, -100%);
}

.wheel-segment:nth-child(8) {
    transform: rotate(315deg) translate(-100%, -100%);
}
</style>