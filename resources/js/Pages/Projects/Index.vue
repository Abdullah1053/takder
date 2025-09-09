<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';

defineProps({
    projects: Array,
});

const form = useForm({
    name: '',
    description: '',
});

const confirmingProjectDeletion = ref(false);
const projectToDelete = ref(null);

const submit = () => {
    form.post(route('projects.store'), {
        onSuccess: () => form.reset(),
    });
};

const confirmProjectDeletion = (id) => {
    projectToDelete.value = id;
    confirmingProjectDeletion.value = true;
};

const deleteProject = () => {
    router.delete(route('projects.destroy', projectToDelete.value), {
        onSuccess: () => closeModal(),
    });
};

const closeModal = () => {
    confirmingProjectDeletion.value = false;
    projectToDelete.value = null;
};
</script>

<template>
    <AppLayout title="Projects">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Create New Project</h3>
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" v-model="form.name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                            <div v-if="form.errors.name" class="text-red-600 text-sm mt-1">{{ form.errors.name }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                            <textarea v-model="form.description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                            <div v-if="form.errors.description" class="text-red-600 text-sm mt-1">{{ form.errors.description }}</div>
                        </div>
                        <div>
                            <button type="submit" :disabled="form.processing" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" :class="{ 'opacity-25': form.processing }">
                                Create Project
                            </button>
                        </div>
                    </form>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mt-8">
                    <h3 class="text-lg font-medium text-gray-900">Your Projects</h3>
                    <ul class="mt-4 space-y-2">
                        <li v-for="project in projects" :key="project.id" class="flex justify-between items-center">
                            <Link :href="route('projects.show', project.id)" class="text-indigo-600 hover:text-indigo-900">
                                {{ project.name }}
                            </Link>
                            <DangerButton @click="confirmProjectDeletion(project.id)">
                                Delete
                            </DangerButton>
                        </li>
                    </ul>
                     <div v-if="!projects.length" class="text-center py-8 border-t border-gray-200 mt-4">
                        <p class="text-gray-500">You don't have any projects yet. Create your first one to get started!</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deletion Confirmation Modal -->
        <ConfirmationModal :show="confirmingProjectDeletion" @close="closeModal">
            <template #title>
                Delete Project
            </template>
            <template #content>
                Are you sure you want to delete this project? All of its data will be permanently deleted. This action cannot be undone.
            </template>
            <template #footer>
                <SecondaryButton @click="closeModal">
                    Cancel
                </SecondaryButton>
                <DangerButton class="ms-3" @click="deleteProject">
                    Delete Project
                </DangerButton>
            </template>
        </ConfirmationModal>
    </AppLayout>
</template>
