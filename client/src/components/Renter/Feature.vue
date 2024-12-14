<script setup>
import feature from "@/assets/image/feature-img.png"
</script>

<template>
    <section class="bg-white py-10 md:py-16 xl:relative">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col xl:flex-row justify-end">

                <div class="hidden xl:block xl:absolute left-0 bottom-0 w-full">
                    <img :src="feature" alt="Feature img">
                </div>

                <div class="">

                    <h1 class="font-semibold text-gray-900 text-xl md:text-4xl text-center leading-normal mb-6">Choice
                        of various types of <br> condominium Units</h1>

                    <p class="font-normal text-gray-400 text-md md:text-xl text-center mb-16">We provide a wide of
                        selection of home types for you and your <br> family and are free to choose a home model</p>

                    <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                        <div
                            class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="30" width="30">
                                <path
                                    d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                            </svg>
                        </div>

                        <div class="text-center md:text-left">
                            <h4 class="font-semibold text-gray-900 text-2xl mb-2">Best Home Guarantee</h4>
                            <p class="font-normal text-gray-400 text-xl leading-relaxed">We guarantees the quality of
                                your home you rent <br> from Kombolcha CMS</p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                        <div
                            class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="30" width="30">
                                <path
                                    d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                            </svg>

                        </div>

                        <div class="text-center md:text-left">
                            <h4 class="font-semibold text-gray-900 text-2xl mb-2">Safe Transaction</h4>
                            <p class="font-normal text-gray-400 text-xl leading-relaxed">Your transactions will always
                                be kept confidential <br> and will get discounted</p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4">
                        <div
                            class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="30" width="30">
                                <path
                                    d="M504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-141.7-35.3c4.9-33-20.2-50.7-54.6-62.6l11.1-44.7-27.2-6.8-10.9 43.5c-7.2-1.8-14.5-3.5-21.8-5.1l10.9-43.8-27.2-6.8-11.2 44.7c-5.9-1.3-11.7-2.7-17.4-4.1l0-.1-37.5-9.4-7.2 29.1s20.2 4.6 19.8 4.9c11 2.8 13 10 12.7 15.8l-12.7 50.9c.8 .2 1.7 .5 2.8 .9-.9-.2-1.9-.5-2.9-.7l-17.8 71.3c-1.3 3.3-4.8 8.4-12.5 6.5 .3 .4-19.8-4.9-19.8-4.9l-13.5 31.1 35.4 8.8c6.6 1.7 13 3.4 19.4 5l-11.3 45.2 27.2 6.8 11.2-44.7a1038.2 1038.2 0 0 0 21.7 5.6l-11.1 44.5 27.2 6.8 11.3-45.1c46.4 8.8 81.3 5.2 96-36.7 11.8-33.8-.6-53.3-25-66 17.8-4.1 31.2-15.8 34.7-39.9zm-62.2 87.2c-8.4 33.8-65.3 15.5-83.8 10.9l14.9-59.9c18.4 4.6 77.6 13.7 68.8 49zm8.4-87.7c-7.7 30.7-55 15.1-70.4 11.3l13.5-54.3c15.4 3.8 64.8 11 56.8 43z" />
                            </svg>
                        </div>

                        <div class="text-center md:text-left">
                            <h4 class="font-semibold text-gray-900 text-2xl mb-2">Low and Cost Home Taxes</h4>
                            <p class="font-normal text-gray-400 text-xl leading-relaxed">By buying a house from,
                                you will get a tax <br> Kombolcha CMS discount</p>
                        </div>
                    </div>

                </div>

            </div>

        </div> <!-- container.// -->

    </section>
</template>