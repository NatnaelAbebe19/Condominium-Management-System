<script setup>
import bookingImage from '@/assets/image/book.png'

</script>

<template>
    <div class="container max-w-screen-xl mx-auto px-4 xl:relative">

        <div class="bg-green-800 flex flex-col lg:flex-row items-center justify-evenly py-14 rounded-3xl">

            <div class="text-center lg:text-left mb-10 lg:mb-0">
                <h1 class="font-semibold text-white text-4xl md:text-5xl lg:text-7xl leading-normal mb-4">Talk
                    to us <br> to discuss</h1>

                <p class="font-normal text-white text-md md:text-xl">Need more time to discuss? Won’t worry, we
                    are <br> ready to help you. You can fill in the column on the <br> right to book a meeting
                    with us. Totally free.</p>
            </div>

            <div class="hidden xl:block xl:absolute right-0">
                <img :src="bookingImage" alt="Image">
            </div>

            <div class="hidden md:block bg-white xl:relative px-6 py-3 rounded-3xl">
                <div class="py-3">
                    <h3 class="font-semibold text-gray-900 text-3xl">Send us an Email</h3>
                </div>

                <div class="py-3">
                    <input type="text" placeholder="Full Name"
                        class="px-4 py-4 w-96 bg-gray-100 placeholder-gray-400 rounded-xl outline-none">
                </div>

                <div class="py-3">
                    <input type="text" placeholder="Email"
                        class="px-4 py-4 w-96 bg-gray-100 placeholder-gray-400 rounded-xl outline-none">
                </div>

                <div class="py-3">
                    <button
                        class="w-full py-4 font-semibold text-lg text-white bg-green-700 rounded-xl hover:bg-green-900 transition ease-in-out duration-500">Send</button>
                </div>
            </div>

        </div>

    </div>
</template>