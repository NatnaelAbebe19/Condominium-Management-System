<script setup>
import GuestLayout from '@/Layout/GuestLayout.vue';
import { ref } from "vue";


const ChosenRole = ref('renter');
const setRole = (role) => {
    ChosenRole.value = role;
}

</script>

<template>
    <GuestLayout>
        <div class="my-40 ">
            <h1 class="text-4xl mb-10 text-center text-green-700 font-bold">Join as a Customer or Renter</h1>
            <div class="flex justify-center items-center gap-x-12 ">
                <div @click="setRole('user')"
                    :class="{ 'border-green-700': ChosenRole === 'user', 'hover:border-green-700': ChosenRole !== 'user' }"
                    class="relative w-80 h-60 border-4 p-4 rounded-lg flex items-center transtion-all duration-300 ease-in-out cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-4 right-4" width="32" height="32"
                        id="circle">
                        <path
                            d="M16 4C9.372 4 4 9.372 4 16s5.372 12 12 12 12-5.372 12-12S22.628 4 16 4zm0 22c-5.514 0-10-4.486-10-10S10.486 6 16 6s10 4.486 10 10-4.486 10-10 10zm-6-10a6 6 1080 1 0 12 0 6 6 1080 1 0-12 0z">
                        </path>
                        <path v-if="ChosenRole === 'user'" fill="#15803d"
                            d="M16 4C9.372 4 4 9.372 4 16s5.372 12 12 12 12-5.372 12-12S22.628 4 16 4zm0 22c-5.514 0-10-4.486-10-10S10.486 6 16 6s10 4.486 10 10-4.486 10-10 10zm-6-10a6 6 1080 1 0 12 0 6 6 1080 1 0-12 0z">
                        </path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-4 left-4" width="50" height="50"
                        aria-hidden="true" data-name="Layer 1" viewBox="0 0 24 24" role="img">
                        <path fill="none" vector-effect="non-scaling-stroke" stroke="var(--icon-color, #001e00)"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19.28 21h-6.9a1.6 1.6 0 01-1.73-1.5v-4a1.6 1.6 0 011.73-1.5h6.9A1.59 1.59 0 0121 15.5v4a1.66 1.66 0 01-1.72 1.5z">
                        </path>
                        <path fill="none" vector-effect="non-scaling-stroke" stroke="var(--icon-color, #001e00)"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16.9 12h-2.15a.65.65 0 00-.72.66V14h3.59v-1.34a.65.65 0 00-.72-.66z"></path>
                        <line x1="10.65" x2="21" y1="17.29" y2="17.29" fill="none" vector-effect="non-scaling-stroke"
                            stroke="var(--icon-color, #001e00)" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5"></line>
                        <circle cx="10.04" cy="5.73" r="2.73" fill="none" vector-effect="non-scaling-stroke"
                            stroke="var(--icon-color, #001e00)" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5"></circle>
                        <path fill="none" vector-effect="non-scaling-stroke" stroke="var(--icon-color, #001e00)"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 18.45v-.9a7 7 0 017-7h.09a6.73 6.73 0 011.91.27"></path>
                    </svg>
                    <h3 class="text-3xl font-bold mt-8">I am a customer, Looking for a house </h3>
                </div>
                <div @click="setRole('renter')"
                    :class="{ 'border-green-700': ChosenRole === 'renter', 'hover:border-green-700': ChosenRole !== 'renter' }"
                    class="relative w-80 h-60 border-4 p-4 rounded-lg flex items-center justify-center transtion-all duration-300 ease-in-out cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-4 right-4" width="32" height="32"
                        id="circle">
                        <path
                            d="M16 4C9.372 4 4 9.372 4 16s5.372 12 12 12 12-5.372 12-12S22.628 4 16 4zm0 22c-5.514 0-10-4.486-10-10S10.486 6 16 6s10 4.486 10 10-4.486 10-10 10zm-6-10a6 6 1080 1 0 12 0 6 6 1080 1 0-12 0z">
                        </path>
                        <path v-if="ChosenRole === 'renter'" fill="#15803d"
                            d="M16 4C9.372 4 4 9.372 4 16s5.372 12 12 12 12-5.372 12-12S22.628 4 16 4zm0 22c-5.514 0-10-4.486-10-10S10.486 6 16 6s10 4.486 10 10-4.486 10-10 10zm-6-10a6 6 1080 1 0 12 0 6 6 1080 1 0-12 0z">
                        </path>
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-4 left-4" width="50" height="50"
                        fill="none" aria-hidden="true" viewBox="0 0 24 24" role="img">
                        <path vector-effect="non-scaling-stroke" stroke="var(--icon-color, #001e00)"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.43 21H5.99M3 18.45v-.9a7 7 0 017-7h.09a6.94 6.94 0 013.79 1.12m5.5 9.33h-11L10 14h11l-1.62 7zm-4.69-3a.5.5 0 100-1 .5.5 0 000 1zM12.77 5.73a2.73 2.73 0 11-5.46 0 2.73 2.73 0 015.46 0z">
                        </path>
                    </svg>
                    <h3 class="text-3xl font-bold mt-8">I am a renter, Listing my property </h3>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>