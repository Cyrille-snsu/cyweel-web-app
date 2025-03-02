<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-gray-800 to-black">
        <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-2xl overflow-hidden sm:rounded-xl">
            <div class="mb-8 text-center">
                <div class="text-4xl mb-2">🏨</div>
                <h2 class="text-2xl font-bold text-gray-800">Admin Login</h2>
                <p class="text-gray-600 mt-2">Welcome! Please login to your account.</p>
            </div>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit">
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="username">
                        Username
                    </label>
                    <input
                        id="username"
                        type="text"
                        class="block w-full rounded-lg border-gray-300 focus:border-black focus:ring-black transition-colors duration-200"
                        v-model="form.username"
                        required
                        autofocus
                    />
                    <div v-if="form.errors.username" class="text-red-600 text-sm mt-1">
                        {{ form.errors.username }}
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block font-medium text-sm text-gray-700" for="password">
                        Password
                    </label>
                    <input
                        id="password"
                        type="password"
                        class="block w-full rounded-lg border-gray-300 focus:border-black focus:ring-black transition-colors duration-200"
                        v-model="form.password"
                        required
                    />
                    <div v-if="form.errors.password" class="text-red-600 text-sm mt-1">
                        {{ form.errors.password }}
                    </div>
                </div>

                <div class="mt-8">
                    <button
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black transition-colors duration-200"
                        :class="{ 'opacity-75 cursor-not-allowed': form.processing }"
                        :disabled="form.processing"
                    >
                        <span v-if="form.processing">Processing...</span>
                        <span v-else>Sign In</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    username: '',
    password: '',
});

const submit = () => {
    form.post(route('admin.login'), {
        onFinish: () => form.reset('password'),
        onSuccess: () => window.location.href = route('admin.dashboard')
    });
};
</script>
