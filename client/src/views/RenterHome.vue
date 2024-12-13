<script setup>
import RenterHero from '@/components/RenterHero.vue';
import AuthenticatedLayout from '@/Layout/AuthenticatedLayout.vue';
import GuestLayout from '@/Layout/GuestLayout.vue';


</script>

<template>
    <AuthenticatedLayout>
        <main>
            <RenterHero />
        </main>
    </AuthenticatedLayout>
</template>