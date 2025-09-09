<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    stats: Object,
});
</script>

<template>
    <AppLayout title="Admin Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Total Users -->
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                        <h3 class="text-lg font-medium text-gray-900">Total Users</h3>
                        <p class="mt-2 text-3xl font-bold text-gray-800">{{ stats.total_users }}</p>
                    </div>

                    <!-- Total Projects -->
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                        <h3 class="text-lg font-medium text-gray-900">Total Projects</h3>
                        <p class="mt-2 text-3xl font-bold text-gray-800">{{ stats.total_projects }}</p>
                    </div>

                    <!-- Total Tasks -->
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                        <h3 class="text-lg font-medium text-gray-900">Total Tasks</h3>
                        <p class="mt-2 text-3xl font-bold text-gray-800">{{ stats.total_tasks }}</p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
