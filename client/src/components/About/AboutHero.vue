<script setup>
import AboutBg from "@/assets/image/AboutBg.jpg"

</script>

<template>
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
</template>