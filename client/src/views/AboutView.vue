<script setup>
import GuestLayout from '@/Layout/GuestLayout.vue';
import AboutBg from "@/assets/image/AboutBg.jpg"
import ShowcaseCards from '@/components/About/ShowcaseCards.vue';
import OurStory from '@/components/About/OurStory.vue';
import AboutHero from '@/components/About/AboutHero.vue';
import ExpertDevelopers from '@/components/About/ExpertDevelopers.vue';
</script>

<template>
    <GuestLayout>
        <div>
            <!-- Hero Section -->
            <AboutHero />
            <!-- Showcase Cards -->
            <ShowcaseCards />
            <!-- Our Story Section -->
            <OurStory />
            <!-- Expert Developers -->
            <ExpertDevelopers />
        </div>

    </GuestLayout>
</template>