<script setup>
import AuthenticatedLayout from '@/Layout/AuthenticatedLayout.vue';
// import 
import { useRentalStore } from '@/stores/rentals'
import { onMounted, ref } from 'vue';

const { getAllRentals } = useRentalStore();
const rentals = ref([]);
const baseUrl = import.meta.env.VITE_BASE_URL;

onMounted(async () => {
    try {
        const response = await getAllRentals();
        console.log('Fetched rentals:', response);
        rentals.value = response.data; // Adjust this line if the structure is different
    } catch (error) {
        console.error('Error fetching rentals:', error);
    }
    console.log(baseUrl);
});



</script>

<template>
    <AuthenticatedLayout>

        <div class="py-8">
            <h1 class="text-bg-light-green font-bold text-3xl sm:text-4xl md:text-5xl">
                Available Rents provided by you
            </h1>

            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-gray-100 p-4">
                    <img class="w-full" src="https://via.placeholder.com/400x200?text=Car+Image" alt="Car Image" />
                </div>
                <div class="p-6">
                    <h2 class="text-lg font-bold text-gray-800">
                        Comdominium Unit
                    </h2>
                    <p class="text-lg font-semibold text-teal-600 mt-2">

                    </p>
                    <ul class="text-gray-600 mt-4 space-y-1">
                        <li>Seating Capacity: <span class="font-medium">5 Person</span></li>
                        <li>Transmission: <span class="font-medium">Automatic</span></li>
                        <li>Model: <span class="font-medium">2021</span></li>
                        <li>Availability: <span class="font-medium">Yes</span></li>
                        <li class="flex items-center space-x-1">
                            Rating:
                            <div class="flex">
                                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927C9.401 2.22 10.599 2.22 10.951 2.927l1.092 2.21a1 1 0 00.754.548l2.445.356c.82.12 1.15 1.127.555 1.706l-1.77 1.725a1 1 0 00-.287.885l.418 2.438c.139.814-.718 1.427-1.457 1.045l-2.187-1.15a1 1 0 00-.933 0l-2.187 1.15c-.739.382-1.596-.23-1.457-1.045l.418-2.438a1 1 0 00-.287-.885L2.81 7.747c-.594-.579-.264-1.585.555-1.706l2.445-.356a1 1 0 00.754-.548l1.092-2.21z">
                                    </path>
                                </svg>
                                <!-- Duplicate the star SVG for the remaining 4 stars -->
                                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927C9.401 2.22 10.599 2.22 10.951 2.927l1.092 2.21a1 1 0 00.754.548l2.445.356c.82.12 1.15 1.127.555 1.706l-1.77 1.725a1 1 0 00-.287.885l.418 2.438c.139.814-.718 1.427-1.457 1.045l-2.187-1.15a1 1 0 00-.933 0l-2.187 1.15c-.739.382-1.596-.23-1.457-1.045l.418-2.438a1 1 0 00-.287-.885L2.81 7.747c-.594-.579-.264-1.585.555-1.706l2.445-.356a1 1 0 00.754-.548l1.092-2.21z">
                                    </path>
                                </svg>
                            </div>
                        </li>
                    </ul>
                    <button class="mt-6 w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
                        Reserve Now
                    </button>
                </div>
            </div>
            <div v-if="rentals.length > 0" class="mt-16 grid gap-x-4 gap-y-4 lg:grid-cols-2 xl:grid-cols-3">
                <div v-for="rental in rentals" :key="rental.id" class="rental-card">
                    <div v-if="rental.images.length > 0">
                        <img v-for="(image) in rental.images.slice(0, 1)" :key="image.id"
                            :src="`${baseUrl}/storage/${image.image}`" alt="Rental Image" class="rental-image" />
                        <button v-if="rental.images.length > 2" class="mt-2 text-blue-500 hover:underline">
                            See more images
                        </button>
                    </div>
                    <h2><span class="font-bold">Location:</span> {{ rental.location }}</h2>
                    <p><span class="font-bold">Bedrooms:</span> {{ rental.bedrooms }}</p>
                    <p><span class="fontt-bold">Floor:</span> {{ rental.floor }}</p>
                    <p><span class="font-bold">Area:</span> {{ rental.area }} sqm</p>
                    <p><span class="font-bold">Price: $</span>{{ rental.price }}</p>
                    <p><span class="font-bold">Status: </span>{{ rental.status }}</p>
                    <button class="mt-6 w-full bg-green-700 text-white py-2 rounded-lg hover:bg-green-800 transition">
                        Reserve Now
                    </button>
                </div>
            </div>
            <div v-else>
                <p>No Rentals available.</p>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<style scoped>
.rental-card {
    border: 1px solid #ccc;
    padding: 16px;
    border-radius: 8px;
}

.rental-image {
    width: 100%;
    height: auto;
    margin-top: 8px;
}
</style>
// hasbab
