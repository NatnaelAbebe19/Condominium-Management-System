<script setup>
import AuthenticatedLayout from '@/Layout/AuthenticatedLayout.vue';
import { onMounted, reactive } from 'vue';
import { useAuthStore } from "@/stores/auth"; // Import the authentication store

import { useRentalStore } from '@/stores/rentals';
import { useRoute, useRouter } from 'vue-router';
import axios from 'axios';
const authStore = useAuthStore();
const { getRentalById, updateRental, deleteImage, uploadImages } = useRentalStore();
const route = useRoute();
const router = useRouter();


const form = reactive({
    location: '',
    status: '',
    bedrooms: '',
    area: '',
    price: '',
    floor: '',
    renter_id: authStore.user.id,
    images: []
});
const baseUrl = import.meta.env.VITE_BASE_URL;

const rentalId = route.params.id;
console.log(rentalId);
onMounted(async () => {
    try {
        const response = await getRentalById(rentalId);
        const rental = response.data;
        console.log(rental);
        form.location = rental.location;
        form.status = rental.status;
        form.bedrooms = rental.bedrooms;
        form.area = rental.area;
        form.price = rental.price;
        form.floor = rental.floor;
        form.images = rental.images;
    } catch (error) {
        console.error('Error fetching rental data:', error);
    }
});

const handleSubmit = async () => {
    try {
        await updateRental(rentalId, form);
        router.push({ name: 'rentalsView' });
    } catch (error) {
        console.error('Error updating rental:', error);
    }
}


const handleDeleteImage = async (imageId) => {
    try {
        await deleteImage(imageId);
        form.images = form.images.filter(image => image.id !== imageId);
    } catch (error) {
        console.error('Error deleting image:', error);
    }
};

const handleImageUpload = async (event) => {
    const file = event.target.files[0];
    const formData = new FormData();
    formData.append('rental_id', rentalId);
    formData.append('image', file);

    try {
        // const response = await uploadImages(formData);
        await axios.get('/sanctum/csrf-cookie');
        const response = await axios.post('/api/rental_image', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                Authorization: `Bearer ${localStorage.getItem("token")}`,
            },
        });
        form.images.push(...response.data);
    } catch (error) {
        console.error('Error uploading images:', error);
    }
};
</script>

<template>
    <AuthenticatedLayout>
        <form class="max-w-xl mx-auto mt-10" @submit.prevent="handleSubmit" enctype="multipart/form-data">
            <div class="border-2 rounded-lg p-8 ">
                <h2 class="text-3xl font-semibold text-green-700 text-center py-4">Edit your Property</h2>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 ">Location</label>
                        <input type="text" id="location" v-model="form.location" :readonly="form.status === 'reserved'"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Bole" required />
                    </div>
                    <div>
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Select the
                            Status</label>
                        <select id="countries" v-model="form.status" :disabled="form.status === 'reserved'"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="available">Available</option>
                            <option disabled value="reserved">Reserved</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                    <div>
                        <label for="bedrooms" class="block mb-2 text-sm font-medium text-gray-900 ">bedrooms</label>
                        <input type="number" id="bedrooms" v-model="form.bedrooms"
                            :readonly="form.status === 'reserved'"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="" required />
                    </div>
                    <div>
                        <label for="area" class="block mb-2 text-sm font-medium text-gray-900 ">area</label>
                        <input type="number" id="area" v-model="form.area" :readonly="form.status === 'reserved'"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="" required />
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">price</label>
                        <input type="number" id="price" v-model="form.price" :readonly="form.status === 'reserved'"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="" required />
                    </div>
                    <div>
                        <label for="floor" class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>
                        <input type="number" id="floor" max="6" v-model="form.floor"
                            :readonly="form.status === 'reserved'"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="" required />
                    </div>

                </div>
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Images</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div v-for="image in form.images" :key="image.id" class="relative">
                            <img :src="`${baseUrl}/storage/${image.image}`" alt="Rental Image"
                                class="w-auto h-52 object-cover rounded-lg" />
                            <button v-if="form.status !== 'reserved'" type="button" @click="handleDeleteImage(image.id)"
                                class="absolute top-2 right-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="20" width="20">
                                    <path fill="#FF0000"
                                        d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <input type="file" @change="handleImageUpload" class="mt-4" />
                </div>
                <button type="submit"
                    class="text-white bg-green-700 text-bold hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center my-4">Submit</button>
            </div>
        </form>
    </AuthenticatedLayout>
</template>