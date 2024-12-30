<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import AuthenticatedLayout from '@/Layout/AuthenticatedLayout.vue';

const notifications = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/api/notifications', {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
        });
        notifications.value = response.data.notifications;

        // Mark notifications as read
        await axios.post('/api/notifications/mark-as-read', {}, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
        });
    } catch (error) {
        console.error('Error fetching notifications:', error);
    }
});

async function handleAction(notification, action) {
    try {
        const response = await axios.put(`/api/reservations/${notification.data.reservation_id}`, {
            status: action,
            user_id: notification.data.user_id, // Pass the user ID
        }, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
        });

        // Mark the notification as read or delete it
        await axios.put(`/api/notifications/${notification.id}`, { status: action, }, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
        });

        // Update the notification in the list
        const updatedNotification = notifications.value.find(n => n.id === notification.id);
        if (updatedNotification) {
            updatedNotification.data.status = action;
        }
    } catch (error) {
        console.error(`Error ${action} reservation:`, error);
    }
}
</script>

<template>
    <AuthenticatedLayout>
        <h2 class="text-2xl font-bold mb-4">Notifications</h2>
        <div v-if="notifications.length > 0">
            <div v-for="notification in notifications" :key="notification.id" class="p-4 mb-4 border rounded-lg">
                <p>{{ notification.data.message }}</p>
                <p><strong>Requested by:</strong> {{ notification.data.user_name }} ({{ notification.data.user_email }})
                </p>
                <p><strong>Status:</strong> {{ notification.data.status }}</p>
                <div class="mt-2" v-if="notification.data.status === 'pending'">
                    <button @click="handleAction(notification, 'approved')"
                        class="bg-green-500 text-white px-4 py-2 rounded-lg mr-2">Approve</button>
                    <button @click="handleAction(notification, 'denied')"
                        class="bg-red-500 text-white px-4 py-2 rounded-lg">Deny</button>
                </div>
            </div>
        </div>
        <div v-else>
            <p>No notifications available.</p>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
/* Add your styles here */
</style>