<script setup>
import Contact from '@/components/Contact.vue';
import Feature from '@/components/Renter/Feature.vue';
import RenterHero from '@/components/RenterHero.vue';
import AuthenticatedLayout from '@/Layout/AuthenticatedLayout.vue';
import GuestLayout from '@/Layout/GuestLayout.vue';


</script>

<template>
    <AuthenticatedLayout>
        <main>
            <RenterHero />
            <Feature />
            <div class="my-20">
                <Contact />
            </div>
        </main>
    </AuthenticatedLayout>
</template>