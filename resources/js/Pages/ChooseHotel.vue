<template>
    <MainLayout>
        <div class="min-h-screen pt-24 pb-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold text-center mb-12">Choose Your Hotel</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="hotel in hotels" :key="hotel.id" class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img :src="'/storage/' + hotel.image" :alt="hotel.name" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-2">{{ hotel.name }}</h3>
                            <p class="text-gray-600 mb-4">{{ hotel.description }}</p>
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>{{ hotel.location }}</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>4.8/5 Guest Rating</span>
                                </div>
                            </div>
                            <Link 
                                :href="route('choose.room', { hotel: hotel.name })"
                                class="block w-full bg-blue-600 text-center text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
                            >
                                Select Hotel
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

defineProps({
    hotels: {
        type: Array,
        required: true
    }
});
</script>
