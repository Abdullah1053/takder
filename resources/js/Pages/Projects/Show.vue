<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    project: Object,
});
</script>

<template>
    <AppLayout :title="project.name">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ project.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <p class="mb-4">{{ project.description }}</p>

                    <h3 class="text-lg font-medium text-gray-900 mt-6">Tasks</h3>
                    <ul>
                        <li v-for="task in project.tasks" :key="task.id">
                            {{ task.title }} - ({{ task.status }})
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
