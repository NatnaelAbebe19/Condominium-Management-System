<script setup>
import AuthenticatedLayout from '@/Layout/AuthenticatedLayout.vue';

</script>

<template>
    <AuthenticatedLayout>
        <form class="max-w-3xl mx-auto">




            <div class="max-w-md">
                <label for="bedrooms-input" class="block mb-2 text-sm font-medium text-gray-900 ">Choose
                    quantity:</label>
                <div class="relative flex items-center max-w-[11rem]">
                    <button type="button" id="decrement-button" data-input-counter-decrement="bedrooms-input"
                        class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h16" />
                        </svg>
                    </button>
                    <input type="text" id="bedrooms-input" data-input-counter data-input-counter-min="1"
                        data-input-counter-max="5" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border-x-0 border-gray-300 h-11 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                        placeholder="" value="3" required />
                    <div
                        class="absolute bottom-1 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                        <svg class="w-2.5 h-2.5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9" />
                        </svg>
                        <span>Bedrooms</span>
                    </div>
                    <button type="button" id="increment-button" data-input-counter-increment="bedrooms-input"
                        class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </button>
                </div>
                <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500">Please select the
                    number of bedrooms.</p>
            </div>
            <div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Location</label>
                    <input type="text" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="Piassa" required />
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
            </div>
        </form>



    </AuthenticatedLayout>
</template>