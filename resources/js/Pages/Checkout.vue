<template>
    <MainLayout>
        <div class="min-h-screen pt-24 pb-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto">
                    <h1 class="text-4xl font-bold text-center mb-8">Checkout</h1>
                    
                    <!-- Booking Summary -->
                    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                        <h2 class="text-2xl font-bold mb-4">Booking Summary</h2>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Hotel:</span>
                                <span class="font-semibold">{{ hotel }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Room Type:</span>
                                <span class="font-semibold">{{ roomTypes[room] }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Price per Night:</span>
                                <span class="font-semibold">₱{{ price }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Days of Stay:</span>
                                <span class="font-semibold">{{ daysOfStay }} days</span>
                            </div>
                            <div class="border-t pt-4">
                                <div class="flex justify-between items-center text-lg font-bold">
                                    <span>Total Amount:</span>
                                    <span>₱{{ totalAmount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Guest Information Form -->
                    <form @submit.prevent="submitBooking" class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-2xl font-bold mb-6">Guest Information</h2>
                        
                        <div class="space-y-6">
                            <!-- Personal Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                    <input 
                                        type="text" 
                                        v-model="form.guest_name"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input 
                                        type="tel" 
                                        v-model="form.phone"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Address -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                <textarea 
                                    v-model="form.address"
                                    rows="2"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required
                                ></textarea>
                            </div>

                            <!-- Dates -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Check-in Date</label>
                                    <input 
                                        type="date" 
                                        v-model="form.check_in_date"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required
                                        :min="today"
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Check-out Date</label>
                                    <input 
                                        type="date" 
                                        v-model="form.check_out_date"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required
                                        :min="minCheckoutDate"
                                    >
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Payment Method</label>
                                <select 
                                    v-model="form.payment_method"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required
                                >
                                    <option value="">Select a payment method</option>
                                    <option value="cash">Cash</option>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="gcash">GCash</option>
                                    <option value="maya">Maya</option>
                                </select>
                            </div>

                            <!-- Special Requests -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Special Requests</label>
                                <textarea 
                                    v-model="form.special_requests"
                                    rows="3"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Any special requests or preferences?"
                                ></textarea>
                            </div>
                        </div>

                        <div class="mt-8">
                            <button 
                                type="submit"
                                class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
                                :disabled="processing"
                            >
                                {{ processing ? 'Processing...' : 'Confirm Booking' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { router } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const props = defineProps({
    hotel: String,
    room: String,
    price: Number
});

const processing = ref(false);

/* const hotels = {
    'Hotel Tavern': 'Hotel Tavern',
    'Gateway Hotel': 'Gateway Hotel',
    'E.Y Suites': 'E.Y Suites'
}; */

const roomTypes = {
    small: 'Small Room',
    medium: 'Medium Room',
    large: 'Large Room',
    luxury: 'Luxury Suite'
};

const form = ref({
    hotel: props.hotel,
    room_type: props.room,
    price: props.price,
    guest_name: '',
    phone: '',
    address: '',
    check_in_date: '',
    check_out_date: '',
    payment_method: '',
    special_requests: '',
});

const today = computed(() => {
    const date = new Date();
    return date.toISOString().split('T')[0];
});

const minCheckoutDate = computed(() => {
    if (!form.value.check_in_date) return today.value;
    const date = new Date(form.value.check_in_date);
    date.setDate(date.getDate() + 1);
    return date.toISOString().split('T')[0];
});

const daysOfStay = computed(() => {
    if (!form.value.check_in_date || !form.value.check_out_date) return 1;
    const start = new Date(form.value.check_in_date);
    const end = new Date(form.value.check_out_date);
    return Math.ceil((end - start) / (1000 * 60 * 60 * 24));
});

const totalAmount = computed(() => {
    return props.price * daysOfStay.value;
});

const submitBooking = () => {
    processing.value = true;
    
    const bookingData = {
        ...form.value,
        days_of_stay: daysOfStay.value,
        total_price: totalAmount.value
    };

    router.post('/bookings', bookingData, {
        onSuccess: () => {
            processing.value = false;
            // Will be redirected to profile page
        },
        onError: () => {
            processing.value = false;
        }
    });
};
</script>
