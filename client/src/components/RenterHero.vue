<script setup>
import home from "../../src/assets/image/condominiumImage.jpg"

</script>

<template>
    <div class="flex items-center justify-center xl:justify-start h-[85vh]">
        <div class="-mt-72 text-center xl:text-left">
            <h1 class="font-semibold text-4xl md:text-6xl lg:text-7xl text-gray-900 leading-normal mb-6">Sell or rent
                your
                <br> available house and<br /> Earn More
            </h1>
            <p class="font-normal text-xl text-gray-400 leading-relaxed mb-12">Owning a house is a big step, but renting
                can be just as rewarding.
                Have you <br> found the perfect tenants for your property?</p>
            <div class="flex gap-x-10">
                <button
                    class="px-6 py-4 bg-green-700 text-white font-semibold text-lg rounded-xl hover:bg-green-900 transition ease-in-out duration-500">
                    Post Your Rental
                </button>
                <button
                    class="px-6 py-4 border-2 border-green-700 text-green-700 font-semibold text-lg rounded-xl hover:bg-slate-200 transition ease-in-out duration-500">
                    View Your Rentals
                </button>
            </div>
        </div>
        <div class="hidden xl:block xl:absolute z-0 top-28 right-0">
            <img :src="home" alt="Home img">
        </div>
    </div>
</template>