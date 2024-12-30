<script setup>
import { useRentalStore } from '@/stores/rentals'
import { onMounted, ref } from 'vue';
import { RouterLink } from 'vue-router';

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

const isOpen = ref(false);

function closeModal() {
    isOpen.value = false
}
function openModal() {
    isOpen.value = true
}



</script>

<template>
    <div class="">
        <h2 class="flex gap-x-2 items-center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="40"
                width="40">
                <path fill="#15803d"
                    d="M64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16l80 0 0-64c0-26.5 21.5-48 48-48s48 21.5 48 48l0 64 80 0c8.8 0 16-7.2 16-16l0-384c0-8.8-7.2-16-16-16L64 48zM0 64C0 28.7 28.7 0 64 0L320 0c35.3 0 64 28.7 64 64l0 384c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm88 40c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16l0 48c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-48zM232 88l48 0c8.8 0 16 7.2 16 16l0 48c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-48c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16l0 48c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-48zm144-16l48 0c8.8 0 16 7.2 16 16l0 48c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-48c0-8.8 7.2-16 16-16z" />
            </svg>
            <span class="text-green-700 text-3xl font-bold">Available Rents</span>
        </h2>
        <div v-if="rentals.length > 0" class="mt-16 grid grid-cols-3 gap-4 ">
            <div v-for="rental in rentals.slice(0, 6)" :key="rental.id" class="rental-card space-y-2 mb-8">
                <div v-if="rental.images.length > 0">
                    <img v-for="(image) in rental.images.slice(0, 1)" :key="image.id"
                        :src="`${baseUrl}/storage/${image.image}`" alt="Rental Image" class="rental-image" />
                    <RouterLink :to="{ name: 'showRental', params: { id: rental.id } }" v-if="rental.images.length > 1"
                        class="mt-2 text-blue-500 hover:underline">
                        See more images({{ rental.images.length - 1 }})
                    </RouterLink>
                </div>
                <div v-else class="bg-gray-100 p-4">
                    <img class="w-full" src="https://via.placeholder.com/400x200?text=No+Image+Yet" alt="House Image" />
                </div>
                <h2 class="capitalize flex"><span class="font-bold mr-2"><span class="flex space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="20" width="20">
                                <path fill="#15803d"
                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                            </svg><span>Location:</span>
                        </span></span> {{ rental.location }}</h2>
                <p class="capitalize flex"><span class="flex space-x-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" height="20" width="20">
                            <path fill="#15803d"
                                d="M32 32c17.7 0 32 14.3 32 32l0 256 224 0 0-160c0-17.7 14.3-32 32-32l224 0c53 0 96 43 96 96l0 224c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-32-224 0-32 0L64 416l0 32c0 17.7-14.3 32-32 32s-32-14.3-32-32L0 64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" />
                        </svg> <span class="font-bold">Bedrooms:</span>
                    </span> {{ rental.bedrooms }}</p>
                <p class="capitalize flex"><span class="flex space-x-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="20" width="20">
                            <path fill="#15803d"
                                d="M64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16l80 0 0-64c0-26.5 21.5-48 48-48s48 21.5 48 48l0 64 80 0c8.8 0 16-7.2 16-16l0-384c0-8.8-7.2-16-16-16L64 48zM0 64C0 28.7 28.7 0 64 0L320 0c35.3 0 64 28.7 64 64l0 384c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm88 40c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16l0 48c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-48zM232 88l48 0c8.8 0 16 7.2 16 16l0 48c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-48c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16l0 48c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-48zm144-16l48 0c8.8 0 16 7.2 16 16l0 48c0 8.8-7.2 16-16 16l-48 0c-8.8 0-16-7.2-16-16l0-48c0-8.8 7.2-16 16-16z" />
                        </svg><span class="font-bold">Floor:</span>
                    </span> {{ rental.floor }}</p>
                <p class="capitalize flex"><span class="flex space-x-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="20" width="20">
                            <path fill="#15803d"
                                d="M384 80c8.8 0 16 7.2 16 16l0 320c0 8.8-7.2 16-16 16L64 432c-8.8 0-16-7.2-16-16L48 96c0-8.8 7.2-16 16-16l320 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32z" />
                        </svg><span class="font-bold">Area:</span>
                    </span> {{ rental.area }} sqm</p>
                <p class="capitalize flex"><span class="flex space-x-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" height="20" width="20">
                            <path fill="#15803d"
                                d="M160 0c17.7 0 32 14.3 32 32l0 35.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11l0 33.4c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-34.9c-.4-.1-.9-.1-1.3-.2l-.2 0s0 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3c-16.1-7.2-23.4-26.1-16.2-42.2s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7s0 0 0 0C119.4 279.3 84.4 270 58.4 253c-14.2-9.3-27.5-22-35.8-39.6c-8.4-17.9-10.1-37.9-6.1-59.2C23.7 116 52.3 91.2 84.8 78.3c13.3-5.3 27.9-8.9 43.2-11L128 32c0-17.7 14.3-32 32-32z" />
                        </svg> <span class="font-bold">Price: $</span>
                    </span>{{ rental.price }}</p>
                <p class="capitalize flex"><span class="flex space-x-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" height="20" width="20">
                            <path fill="#15803d"
                                d="M290.8 48.6l78.4 29.7L288 109.5 206.8 78.3l78.4-29.7c1.8-.7 3.8-.7 5.7 0zM136 92.5l0 112.2c-1.3 .4-2.6 .8-3.9 1.3l-96 36.4C14.4 250.6 0 271.5 0 294.7L0 413.9c0 22.2 13.1 42.3 33.5 51.3l96 42.2c14.4 6.3 30.7 6.3 45.1 0L288 457.5l113.5 49.9c14.4 6.3 30.7 6.3 45.1 0l96-42.2c20.3-8.9 33.5-29.1 33.5-51.3l0-119.1c0-23.3-14.4-44.1-36.1-52.4l-96-36.4c-1.3-.5-2.6-.9-3.9-1.3l0-112.2c0-23.3-14.4-44.1-36.1-52.4l-96-36.4c-12.8-4.8-26.9-4.8-39.7 0l-96 36.4C150.4 48.4 136 69.3 136 92.5zM392 210.6l-82.4 31.2 0-89.2L392 121l0 89.6zM154.8 250.9l78.4 29.7L152 311.7 70.8 280.6l78.4-29.7c1.8-.7 3.8-.7 5.7 0zm18.8 204.4l0-100.5L256 323.2l0 95.9-82.4 36.2zM421.2 250.9c1.8-.7 3.8-.7 5.7 0l78.4 29.7L424 311.7l-81.2-31.1 78.4-29.7zM523.2 421.2l-77.6 34.1 0-100.5L528 323.2l0 90.7c0 3.2-1.9 6-4.8 7.3z" />
                        </svg><span class="font-bold">Status: </span>
                    </span>{{ rental.status }}</p>

                <div class="inset-0 flex items-center justify-center">
                    <RouterLink :to="{ name: 'showRental', params: { id: rental.id } }"
                        class="rounded-md bg-green-700 px-4 py-2 text-sm font-bold text-white hover:bg-green-800 w-full text-center">
                        Explore Details/Reserve
                    </RouterLink>
                </div>

            </div>
        </div>
        <div v-if="rentals.length > 6" class="mt-8 flex gap-x-2">
            <RouterLink :to="{ name: 'rentals' }" class="text-blue-500 hover:underline flex gap-x-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="15" width="25">
                    <path fill="#0000FF"
                        d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                </svg> <span class="">View All Rentals</span>
            </RouterLink>
        </div>
    </div>

</template>
<style scoped>
.rental-card {
    border: 1px solid #ccc;
    padding: 16px;
    border-radius: 8px;
}

.rental-image {
    width: 100%;
    height: 200px;
    /* Set a fixed height for the images */
    object-fit: cover;
    /* Ensure the image covers the entire area */
    margin-top: 8px;
}
</style>
