<script setup>
import profile1 from "@/assets/image/testimoni-3.png"
import profile2 from "@/assets/image/testimoni-4.png"
</script>

<template>
    <div class="bg-gray-50 py-12">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-8">Expert Developers</h2>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                <!-- Developer 1 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <img :src="profile1" alt="Robert Hendz" class="w-20 h-20 mx-auto rounded-full mb-4">
                    <h3 class="text-lg font-semibold">Minweyelet Getachew </h3>
                    <p class="text-gray-500">Project Manager</p>
                </div>
                <!-- Developer 2 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <img :src="profile2" alt="Loreen James" class="w-20 h-20 mx-auto rounded-full mb-4">
                    <h3 class="text-lg font-semibold">Lamrot Wondimu </h3>
                    <p class="text-gray-500">Developer</p>
                </div>
                <!-- Developer 3 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <img :src="profile1" alt="Mike Brenson" class="w-20 h-20 mx-auto rounded-full mb-4">
                    <h3 class="text-lg font-semibold">Hikma Murad </h3>
                    <p class="text-gray-500">Database Designer</p>
                </div>
                <!-- Developer 4 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <img :src="profile2" alt="Brett Slater" class="w-20 h-20 mx-auto rounded-full mb-4">
                    <h3 class="text-lg font-semibold">Bamlak Zegeye </h3>
                    <p class="text-gray-500">UI/UX Designer</p>
                </div>
                <!-- Developer 5 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <img :src="profile1" alt="Brett Slater" class="w-20 h-20 mx-auto rounded-full mb-4">
                    <h3 class="text-lg font-semibold">Azmeraw Molla </h3>
                    <p class="text-gray-500">Developer</p>
                </div>
            </div>
            <div class="mt-8">
                <a href="#"
                    class="bg-green-700 text-white py-4 px-6 rounded-lg shadow hover:bg-green-900 transition-all ease-in-out duration-500">
                    Contact Developers
                </a>
            </div>
        </div>
    </div>

</template>