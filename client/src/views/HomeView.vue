<script setup>
import GuestLayout from "@/Layout/GuestLayout.vue";
import Contact from "@/components/Contact.vue";
import Hero from "@/components/Hero.vue";
import Feature from "@/components/Renter/Feature.vue";
</script>

<template>
  <GuestLayout>
    <main>
      <Hero />
      <Feature />
      <div class="my-20">
        <Contact />
      </div>
    </main>
  </GuestLayout>
</template>
