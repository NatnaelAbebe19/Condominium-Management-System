<script setup>
import AuthenticatedLayout from '@/Layout/AuthenticatedLayout.vue';

</script>

<template>
    <AuthenticatedLayout>
        <form class="max-w-xl mx-auto mt-10 ">

            <div class="border-2 rounded-lg p-8 ">
                <h2 class="text-3xl font-semibold text-green-700 text-center py-4">Post your Porperty</h2>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 ">Location</label>
                        <input type="text" id="location"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Bole" required />
                    </div>
                    <div>
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                            option</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose the status</option>
                            <option value="available">Available</option>
                            <option disabled value="occupied">Occupied</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                    <div>
                        <label for="bedrooms" class="block mb-2 text-sm font-medium text-gray-900 ">bedrooms</label>
                        <input type="number" id="bedrooms"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="" required />
                    </div>
                    <div>
                        <label for="area" class="block mb-2 text-sm font-medium text-gray-900 ">area</label>
                        <input type="number" id="area"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="" required />
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">price</label>
                        <input type="number" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="" required />
                    </div>
                    <div>
                        <label for="floor" class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>
                        <input type="number" id="floor" max="6"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="" required />
                    </div>
                </div>


                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to
                                    upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
                <button type="submit"
                    class="text-white bg-green-700 text-bold hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center my-4">Submit</button>
            </div>
        </form>



    </AuthenticatedLayout>
</template>