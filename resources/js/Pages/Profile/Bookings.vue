<template>
    <MainLayout>
        <div class="min-h-screen pt-24 pb-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <h1 class="text-4xl font-bold mb-8">My Bookings</h1>

                    <!-- Bookings List -->
                    <div class="space-y-6">
                        <div v-if="bookings.length === 0" class="text-center py-12 bg-white rounded-lg shadow">
                            <p class="text-gray-600">You don't have any bookings yet.</p>
                            <Link 
                                href="/choose-hotel"
                                class="inline-block mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors"
                            >
                                Book a Room
                            </Link>
                        </div>

                        <div v-for="booking in bookings" :key="booking.id" class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-xl font-bold mb-1">{{ hotels[booking.hotel] }}</h3>
                                        <p class="text-gray-600">{{ roomTypes[booking.room_type] }}</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold"
                                              :class="{
                                                  'bg-green-100 text-green-800': booking.status === 'confirmed',
                                                  'bg-yellow-100 text-yellow-800': booking.status === 'pending',
                                                  'bg-gray-100 text-gray-800': booking.status === 'completed'
                                              }">
                                            {{ formatStatus(booking.status) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <span class="block text-sm text-gray-600">Check-in</span>
                                        <span class="font-semibold">{{ formatDate(booking.check_in_date) }}</span>
                                    </div>
                                    <div>
                                        <span class="block text-sm text-gray-600">Check-out</span>
                                        <span class="font-semibold">{{ formatDate(booking.check_out_date) }}</span>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center pt-4 border-t">
                                    <div>
                                        <span class="block text-sm text-gray-600">Total Amount</span>
                                        <span class="text-lg font-bold">₱{{ booking.total_price }}</span>
                                    </div>
                                    <Link 
                                        :href="route('booking.confirmation', booking.id)"
                                        class="text-blue-600 hover:text-blue-800 font-semibold"
                                    >
                                        View Details
                                    </Link>
                                </div>
                            </div>
                        </div>
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
    bookings: Array
});

const hotels = {
    Tavern: 'Hotel Tavern',
    Gateway: 'Gateway Hotel',
    EY: 'E.Y Suites'
};

const roomTypes = {
    small: 'Small Room',
    medium: 'Medium Room',
    large: 'Large Room',
    luxury: 'Luxury Suite'
};

const formatDate = (date) => {
    return new Date(date).toLocaleDateString('en-US', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
};

const formatStatus = (status) => {
    const statusMap = {
        confirmed: 'Confirmed',
        pending: 'Pending',
        completed: 'Completed',
        cancelled: 'Cancelled'
    };
    return statusMap[status] || status;
};
</script>
