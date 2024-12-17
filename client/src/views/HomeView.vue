<script setup>
import GuestLayout from "@/Layout/GuestLayout.vue";
import Contact from "@/components/Contact.vue";
import Hero from "@/components/Hero.vue";
import Feature from "@/components/Renter/Feature.vue";
import AuthenticatedLayout from "@/Layout/AuthenticatedLayout.vue";
import RenterHero from "@/components/RenterHero.vue";
</script>

<template>
    <AuthenticatedLayout>
        <main>
            <Hero />
            <Feature />
            <div class="my-20 h-[60vh]">
                <Contact />
            </div>
        </main>
    </AuthenticatedLayout>
</template>
