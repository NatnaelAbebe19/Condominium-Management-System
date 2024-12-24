<script setup>
import ProgramCard from "@/Components/Home/ProgramCard.vue";
import AdminLayout from "@/Layout/AdminLayout.vue";
import { useProgramStore } from "@/stores/program";
import { onMounted, ref } from "vue";

</script>

<template>
    <AdminLayout>
        <div class="py-8">
            <h1 class="text-bg-light-green font-bold text-3xl sm:text-4xl md:text-5xl">
                Available Rentals
            </h1>
            <div>
                <p>No programs available.</p>
            </div>
        </div>
    </AdminLayout>
</template>