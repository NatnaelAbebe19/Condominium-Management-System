<script setup>
import AuthenticatedLayout from '@/Layout/AuthenticatedLayout.vue';
import GuestLayout from '@/Layout/GuestLayout.vue';
import Contact from '@/components/Contact.vue';
</script>

<template>
    <AuthenticatedLayout>
        <section class="bg-white py-10 md:py-16 h-[80vh] my-auto">
            <Contact />
        </section>
    </AuthenticatedLayout>
</template>