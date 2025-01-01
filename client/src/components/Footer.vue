<script setup>
import image1 from "../assets/image/footer-logo.png"
import Logo from "@/assets/image/Logo.png"
</script>

<template>
    <footer class="bg-white py-10 md:py-16 mt-auto">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col lg:flex-row justify-between">
                <div class="text-center lg:text-left mb-10 lg:mb-0">
                    <div class="flex justify-center lg:justify-start mb-5">
                        <div class="logo">
                            <img :src="Logo" alt="FetaNa Logo" class="w-[150px]" />
                        </div>
                    </div>

                    <p class="font-light text-gray-400 text-xl mb-10">Get your dream house with <br>Kombolcha CMS</p>

                    <div class="flex items-center justify-center lg:justify-start space-x-5">
                        <a href="#"
                            class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500">
                            <i data-feather="facebook"></i>
                        </a>

                        <a href="#"
                            class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500">
                            <i data-feather="twitter"></i>
                        </a>

                        <a href="#"
                            class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500">
                            <i data-feather="linkedin"></i>
                        </a>
                    </div>
                </div>

                <div class="text-center lg:text-left mb-10 lg:mb-0">
                    <h4 class="font-semibold text-gray-900 text-2xl mb-6">Sitemap</h4>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Home</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Features</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Gallery</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Testimoni</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Book
                        a meeting</a>
                </div>

                <div class="text-center lg:text-left mb-10 lg:mb-0">
                    <h4 class="font-semibold text-gray-900 text-2xl mb-6">Landing</h4>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Mobile
                        App</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Property</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Personal
                        Website</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Web
                        Developer</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Online
                        Course</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Donation</a>
                </div>

                <div class="text-center lg:text-left">
                    <h4 class="font-semibold text-gray-900 text-2xl mb-6">Utility</h4>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">FAQ</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Terms
                        & Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</template>