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
                        <RouterLink :to="{ name: 'home' }">
                            <div class="logo">
                                <img :src="Logo" alt="" class="w-[150px]" />
                            </div>
                        </RouterLink>
                    </div>

                    <p class="font-light text-gray-400 text-xl mb-10">Find your perfect home with <br>Kombolcha CMS</p>

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
                    <h4 class="font-semibold text-gray-900 text-2xl mb-6">Navigation</h4>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">
                        <RouterLink :to="{ name: 'welcome' }">Home</RouterLink>
                    </a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">
                        <RouterLink :to="{ name: 'rentals' }">Rentals</RouterLink>
                    </a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">
                        <RouterLink :to="{ name: 'contact' }">Contact</RouterLink>
                    </a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">
                        <RouterLink :to="{ name: 'about' }">About</RouterLink>
                    </a>
                </div>

                <div class="text-center lg:text-left mb-10 lg:mb-0">
                    <h4 class="font-semibold text-gray-900 text-2xl mb-6">Resources</h4>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Blog</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Guides</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Support</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Privacy
                        Policy</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Terms
                        of Service</a>
                </div>

                <div class="text-center lg:text-left">
                    <h4 class="font-semibold text-gray-900 text-2xl mb-6">Company</h4>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Careers</a>

                    <a href="#"
                        class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Press</a>
                </div>
            </div>
        </div>
    </footer>
</template>