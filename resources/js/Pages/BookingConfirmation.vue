<template>
    <MainLayout>
        <div class="min-h-screen pt-24 pb-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-2xl mx-auto">
                    <!-- Success Message -->
                    <div class="text-center mb-8">
                        <div v-if="booking.status === 'confirmed'" class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div v-else class="inline-flex items-center justify-center w-16 h-16 bg-yellow-100 rounded-full mb-4">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ booking.status === 'confirmed' ? 'Booking Confirmed!' : 'Booking Pending Approval' }}</h1>
                        <p class="text-gray-600">{{ booking.status === 'confirmed' ? 'Thank you for choosing Cyweel Hotels. Your booking has been confirmed.' : 'Your booking is currently pending approval. We will notify you once it is confirmed.' }}</p>
                    </div>

                    <!-- Booking Details -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold mb-6">Booking Details</h2>
                            
                            <div class="space-y-4">
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-600">Booking ID</span>
                                    <span class="font-semibold">{{ booking.id }}</span>
                                </div>
                                
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-600">Hotel</span>
                                    <span class="font-semibold">{{ typeof booking.hotel === 'object' ? booking.hotel.name : booking.hotel }}</span>
                                </div>
                                
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-600">Room Type</span>
                                    <span class="font-semibold">{{ booking.room_type }}</span>
                                </div>
                                
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-600">Check-in Date</span>
                                    <span class="font-semibold">{{ formatDate(booking.check_in_date) }}</span>
                                </div>
                                
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-600">Check-out Date</span>
                                    <span class="font-semibold">{{ formatDate(booking.check_out_date) }}</span>
                                </div>
                                
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-600">Total Amount</span>
                                    <span class="font-semibold">₱{{ booking.total_price }}</span>
                                </div>
                                
                                <div v-if="booking.special_requests" class="py-2 border-b">
                                    <span class="block text-gray-600 mb-1">Special Requests</span>
                                    <span class="block font-semibold">{{ booking.special_requests }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-8 space-y-4">
                        <Link 
                            :href="route('profile.bookings')"
                            class="block w-full text-center bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
                        >
                            View All Bookings
                        </Link>
                        
                        <Link 
                            href="/"
                            class="block w-full text-center bg-gray-100 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-colors"
                        >
                            Return to Home
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    booking: Object
});

function formatDate(date) {
    return new Date(date).toLocaleDateString('en-US', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}
</script>
