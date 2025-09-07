<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    projects: Array,
});
</script>

<template>
    <AppLayout title="Projects">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900">Your Projects</h3>
                    <ul>
                        <li v-for="project in projects" :key="project.id">
                            {{ project.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
