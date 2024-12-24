<script setup>
import AuthenticatedLayout from '@/Layout/AuthenticatedLayout.vue';
import { reactive, ref } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';
import { useRentalStore } from '@/stores/rentals';
const rentalStore = useRentalStore();

const route = useRoute();
const rentalId = route.query.rental_id;
const form = reactive({
    rental_id: rentalId,
    image: '',
});
const profilePreview = ref(null);

const handleFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.image = file;
        profilePreview.value = URL.createObjectURL(file); // Create a tempora
    } else {
        form.image = null;
        profilePreview.value = null;
    }
    if (file.size > 10 * 1024 * 1024) {
        alert("File size exceeds 10MB");
        form.photo = null;
        return;
    }
    if (!["image/jpeg", "image/png", "image/jpg"].includes(file.type)) {
        alert("Only JPG, JPEG and PNG are allowed");
        return;
    }

    form.image = file;
};

const handleImageUpload = async () => {
    let formData = new FormData();
    formData.append('rental_id', form.rental_id);
    formData.append('image', form.image);

    try {
        await axios.get('/sanctum/csrf-cookie');
        const response = await axios.post('/api/rental_image', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                Authorization: `Bearer ${localStorage.getItem("token")}`,
            },
        });

        // const response = await rentalStore.uploadImages(form);
        profilePreview.value = null;
        console.log('Image uploaded successfully', response.data);
        // Handle success (e.g., redirect or show a success message)
    } catch (error) {
        console.error('An error occurred while uploading the image:', error);
    }
};




</script>

<template>
    <AuthenticatedLayout>
        <div class="mt-6">
            <RouterLink :to="{ name: 'home' }"
                class="text-green-600 hover:text-green-800 transition duration-300 ease-in-out rounded-lg border-2 p-4 mt-6">
                Back
                to
                Home
            </RouterLink>
        </div>
        <div class="max-w-xl mx-auto mt-10 h-[65vh]">
            <h2 class="text-3xl font-semibold text-green-700 text-center py-4">Upload Image</h2>
            <form @submit.prevent="handleImageUpload" enctype="multipart/form-data">

                <div class="col-span-full">
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm/6 text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-green-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-green-800 focus-within:ring-offset-2 hover:text-green-700">
                                    <span class="text-center">Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" @change="handleFileChange"
                                        class="sr-only">
                                </label>
                            </div>
                            <p class="text-xs/5 text-gray-600">PNG, JPG, JPEG up to 10MB</p>
                        </div>
                    </div>
                </div>
                <div v-if="profilePreview" class="ml-4">
                    <img :src="profilePreview" alt="Image Preview" style="max-width: 500px" />
                </div>
                <button type="submit"
                    class="text-white bg-green-700 text-bold hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center my-4">Upload</button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>