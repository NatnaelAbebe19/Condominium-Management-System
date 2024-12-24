<template>
    <AuthenticatedLayout>
        <form class="max-w-xl mx-auto mt-10" @submit.prevent="handleSubmit" enctype="multipart/form-data">
            <div class="border-2 rounded-lg p-8 ">
                <h2 class="text-3xl font-semibold text-green-700 text-center py-4">Post your Property</h2>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 ">Location</label>
                        <input type="text" id="location" v-model="form.location"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Bole" required />
                    </div>
                    <div>
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Select the
                            Status</label>
                        <select id="countries" v-model="form.status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="available">Available</option>
                            <option disabled value="occupied">Occupied</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                    <div>
                        <label for="bedrooms" class="block mb-2 text-sm font-medium text-gray-900 ">bedrooms</label>
                        <input type="number" id="bedrooms" v-model="form.bedrooms"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="" required />
                    </div>
                    <div>
                        <label for="area" class="block mb-2 text-sm font-medium text-gray-900 ">area</label>
                        <input type="number" id="area" v-model="form.area"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="" required />
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">price</label>
                        <input type="number" id="price" v-model="form.price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="" required />
                    </div>
                    <div>
                        <label for="floor" class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>
                        <input type="number" id="floor" max="6" v-model="form.floor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="" required />
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-green-700 text-bold hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center my-4">Submit</button>
            </div>
        </form>
    </AuthenticatedLayout>
</template>

<script setup>
import { onMounted, reactive, ref } from 'vue';
import { useAuthStore } from "@/stores/auth"; // Import the authentication store
import axios from 'axios';
import { useRentalStore } from '@/stores/rentals';
import AuthenticatedLayout from '@/Layout/AuthenticatedLayout.vue';
const authStore = useAuthStore();
const rentalStore = useRentalStore();
import { useRouter } from 'vue-router';
const router = useRouter();

const form = reactive({
    location: '',
    status: 'available',
    bedrooms: '',
    area: '',
    price: '',
    floor: '',
    // images: [], // Array to hold selected files
    renter_id: authStore.user.id
});

const onSuccess = (file, response) => {
    console.log('File uploaded successfully', file, response);
};

function handleFilePondLoad(response) {
    form.images.push(response);
    return response;
}

const changeMedia = (images) => {
    form.images = images
}

const handleFilePondInit = () => {
    console.log("Filepond has initialized");
}

const errors = ref([]);
const handleFileChange = (event) => {
    form.images = Array.from(event.target.files); // Store selected files in the form state
    console.log(form.images)
};

const handleSubmit = async () => {

    errors.value = []; // Reset errors
    console.log("Form submitted"); // Add this line for debugging
    const formData = new FormData();
    formData.append('bedrooms', form.bedrooms);
    formData.append('floor', form.floor);
    formData.append('location', form.location);
    formData.append('area', form.area);
    formData.append('price', form.price);
    formData.append('status', form.status);
    formData.append('renter_id', form.renter_id);

    try {
        // const response = await axios
        //     .post("/api/rentals", form)
        //     .then((response) => {
        //         console.log("Response", response);
        //     });
        const response = await rentalStore.createRental(form);
        const rentalId = response.data.id; // Assuming the response contains the rental ID
        router.push({ name: 'uploadImages', query: { rental_id: rentalId } });
        // const response = await axios.post('/api/rentals', formData, {
        //     headers: {
        //         'Content-Type': 'multipart/form-data',
        //         Authorization: `Bearer ${localStorage.getItem("token")}`,
        //     },
        // });
        // console.log(response.data);
        // Handle success (e.g., redirect or show a success message)
    } catch (error) {
        if (error.response && error.response.data.errors) {
            errors.value = error.response.data.errors; // Capture validation errors
        } else {
            console.error("An unexpected error occurred:", error);
        }
    }
}
</script>