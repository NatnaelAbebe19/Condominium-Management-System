<script setup>
import GuestLayout from '@/Layout/GuestLayout.vue';
import AboutBg from "@/assets/image/AboutBg.jpg"
import Interior1 from "@/assets/image/Interior1.jpeg"
import Interior2 from "@/assets/image/Interior2.jpeg"
import Interior3 from "@/assets/image/Interior3.jpeg"
</script>

<template>
    <GuestLayout>
        <div>
            <div
                class="relative bg-gradient-to-b from-gray-900 to-gray-700 flex items-center justify-center text-white py-20 min-h-[60vh] mb-20">
                <div class="absolute inset-0">
                    <img :src="AboutBg" alt="Buildings" class="w-full h-full object-cover opacity-30">
                </div>
                <div class="relative container mx-auto px-6 text-center">
                    <h1 class="text-4xl font-bold mb-4">About Us</h1>
                    <p class="text-xl max-w-4xl mx-auto font-bold">
                        Kombolcha CMS is a modern web-based platform designed to revolutionize condominium management in
                        Kombolcha. Whether you're a renter, property owner, or administrator, our system simplifies the
                        process of managing, distributing, and accessing housing opportunities.
                    </p>
                </div>
            </div>
            <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-8"> <!-- First Column -->
                <div class="text-center border-2 rounded-xl px-4 py-8"> <img :src="Interior1" alt="Interior Design One"
                        class="w-full max-w-xs mx-auto mb-6 rounded-lg shadow-md" />
                    <h3 class="text-lg font-bold mb-4">FIND THE PERFECT SPACE FOR YOU</h3>
                    <p class="text-gray-500"> We understand that finding the right space is more than just a decision –
                        it's about creating a home that fits your needs. Our team works tirelessly to find the perfect
                        match for your lifestyle and preferences. </p>
                </div> <!-- Second Column -->
                <div class="text-center border-2 rounded-xl px-4 py-8"> <img :src="Interior2" alt="Interior Design Two"
                        class="w-full max-w-xs mx-auto mb-6 rounded-lg shadow-md" />
                    <h3 class="text-lg font-bold mb-4">WORKING WITH YOUR BUDGET</h3>
                    <p class="text-gray-500"> We believe that beautiful interiors don't have to break the bank. Whether
                        you have a tight budget or a generous one, we provide tailored solutions that maximize your
                        investment and bring your vision to life. </p>
                </div> <!-- Third Column -->
                <div class="text-center border-2 rounded-xl px-4 py-8"> <img :src="Interior3"
                        alt="Interior Design Three" class="w-full max-w-xs mx-auto mb-6 rounded-lg shadow-md" />
                    <h3 class="text-lg font-bold mb-4">LIST YOUR PROPERTY WITH CONFIDENCE</h3>
                    <p class="text-gray-500"> Listing your property should be a hassle-free experience. With our
                        risk-free approach, you can confidently list your property and rest assured that we will handle
                        everything from start to finish. </p>
                </div>
            </div>
            <div>
                <h1>Our Story</h1>
            </div>
        </div>

    </GuestLayout>
</template>