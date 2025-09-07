<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, router } from '@inertiajs/vue3';
import { computed } from 'vue';
import draggable from 'vuedraggablenext';

const props = defineProps({
    project: Object,
});

const taskForm = useForm({
    title: '',
    project_id: props.project.id,
});

const submitTask = () => {
    taskForm.post(route('tasks.store'), {
        onSuccess: () => {
            taskForm.reset();
            router.reload({ only: ['project'] });
        },
    });
};

const backlogTasks = computed(() => props.project.tasks.filter(task => task.status === 'Backlog'));
const todoTasks = computed(() => props.project.tasks.filter(task => task.status === 'To-Do'));
const inProgressTasks = computed(() => props.project.tasks.filter(task => task.status === 'In Progress'));
const doneTasks = computed(() => props.project.tasks.filter(task => task.status === 'Done'));

const columns = [
    { title: 'Backlog', tasks: backlogTasks },
    { title: 'To-Do', tasks: todoTasks },
    { title: 'In Progress', tasks: inProgressTasks },
    { title: 'Done', tasks: doneTasks },
];

const onDragEnd = (event) => {
    const { item, to } = event;
    const taskId = item.dataset.taskId;
    const newStatus = to.dataset.status;

    if (!newStatus) {
        // This can happen if the drop target isn't a valid column.
        // We can choose to do nothing or revert the change visually if needed,
        // but for now, we'll just prevent the API call.
        console.error('Could not determine new status from drop target.');
        return;
    }

    const taskToUpdate = props.project.tasks.find(t => t.id == taskId);
    if (taskToUpdate && taskToUpdate.status !== newStatus) {
        taskToUpdate.status = newStatus;

        router.patch(route('tasks.update', { task: taskId }), {
            status: newStatus,
        }, {
            preserveState: true,
            preserveScroll: true,
        });
    }
};
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
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-8">
                    <h3 class="text-lg font-medium text-gray-900">Project Description</h3>
                    <p class="mt-2 text-sm text-gray-600">{{ project.description || 'No description provided.' }}</p>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Task</h3>
                    <form @submit.prevent="submitTask">
                         <div class="flex items-start">
                            <input type="text" v-model="taskForm.title" placeholder="Enter task title" class="flex-grow rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                            <button type="submit" :disabled="taskForm.processing" class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" :class="{ 'opacity-25': taskForm.processing }">
                                Add Task
                            </button>
                        </div>
                        <div v-if="taskForm.errors.title" class="text-red-600 text-sm mt-1">{{ taskForm.errors.title }}</div>
                    </form>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Columns -->
                    <div v-for="column in columns" :key="column.title" class="bg-gray-100 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ column.title }}</h3>
                        <draggable
                            :list="column.tasks.value"
                            group="tasks"
                            @end="onDragEnd"
                            item-key="id"
                            tag="div"
                            :data-status="column.title"
                            class="space-y-3 min-h-[100px]"
                        >
                            <template #item="{ element: task }">
                                <div class="bg-white p-3 rounded-md shadow cursor-move" :data-task-id="task.id">
                                    <p>{{ task.title }}</p>
                                </div>
                            </template>
                        </draggable>
                        <div v-if="!column.tasks.value.length" class="text-sm text-gray-500 italic mt-3">
                            No tasks in this column.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
