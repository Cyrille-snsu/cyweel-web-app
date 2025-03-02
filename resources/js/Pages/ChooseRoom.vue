<template>
    <MainLayout>
        <div class="min-h-screen pt-24 pb-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold mb-2">Choose Your Room</h1>
                    <p class="text-gray-600">at {{ hotels[hotel] }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                    <!-- Small Room -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="/images/cyweel photos/rooms/small.jpg" alt="Small Room" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-2xl font-bold">Small Room</h3>
                                <div class="text-2xl font-bold text-blue-600">₱500<span class="text-sm text-gray-600">/night</span></div>
                            </div>
                            <p class="text-gray-600 mb-4">Perfect for solo travelers or couples looking for a cozy stay.</p>
                            
                            <div class="space-y-2 mb-6">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Air Conditioning</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Free WiFi</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Single Bed</span>
                                </div>
                            </div>
                            
                            <Link 
                                :href="route('checkout', { hotel: hotel, room: 'small', price: 500 })"
                                class="block w-full bg-blue-600 text-center text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
                            >
                                Book Now
                            </Link>
                        </div>
                    </div>

                    <!-- Medium Room -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="/images/cyweel photos/rooms/medium.jpg" alt="Medium Room" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-2xl font-bold">Medium Room</h3>
                                <div class="text-2xl font-bold text-blue-600">₱800<span class="text-sm text-gray-600">/night</span></div>
                            </div>
                            <p class="text-gray-600 mb-4">Spacious room with additional amenities for a comfortable stay.</p>
                            
                            <div class="space-y-2 mb-6">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Air Conditioning</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Free WiFi</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Queen Size Bed</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Mini Refrigerator</span>
                                </div>
                            </div>
                            
                            <Link 
                                :href="route('checkout', { hotel: hotel, room: 'medium', price: 800 })"
                                class="block w-full bg-blue-600 text-center text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
                            >
                                Book Now
                            </Link>
                        </div>
                    </div>

                    <!-- Large Room -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="/images/cyweel photos/rooms/large.jpg" alt="Large Room" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-2xl font-bold">Large Room</h3>
                                <div class="text-2xl font-bold text-blue-600">₱1,200<span class="text-sm text-gray-600">/night</span></div>
                            </div>
                            <p class="text-gray-600 mb-4">Perfect for families or those seeking extra space and comfort.</p>
                            
                            <div class="space-y-2 mb-6">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Air Conditioning</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Free WiFi</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>2 Queen Size Beds</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Mini Kitchen</span>
                                </div>
                            </div>
                            
                            <Link 
                                :href="route('checkout', { hotel: hotel, room: 'large', price: 1200 })"
                                class="block w-full bg-blue-600 text-center text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
                            >
                                Book Now
                            </Link>
                        </div>
                    </div>

                    <!-- Luxury Room -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="/images/cyweel photos/rooms/luxury.jpg" alt="Luxury Room" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-2xl font-bold">Luxury Suite</h3>
                                <div class="text-2xl font-bold text-blue-600">₱2,000<span class="text-sm text-gray-600">/night</span></div>
                            </div>
                            <p class="text-gray-600 mb-4">Our finest suite with premium amenities and spectacular views.</p>
                            
                            <div class="space-y-2 mb-6">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Premium Air Conditioning</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>High-Speed WiFi</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>King Size Bed</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Full Kitchen</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Private Balcony</span>
                                </div>
                            </div>
                            
                            <Link 
                                :href="route('checkout', { hotel: hotel, room: 'luxury', price: 2000 })"
                                class="block w-full bg-blue-600 text-center text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
                            >
                                Book Now
                            </Link>
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
    hotel: {
        type: String,
        required: true
    }
});

const hotels = {
    manila: 'Hotel Tavern',
    cebu: 'Gateway Hotel',
    davao: 'E.Y Suites'
};

const { hotel } = props;
</script>
