<template>
    <MainLayout>
        <div class="pt-20 bg-gray-100 min-h-screen">
            <div class="container mx-auto px-4 py-8">
                <div class="max-w-3xl mx-auto">
                    <h1 class="text-4xl font-bold text-center mb-8">Complete Your Booking</h1>
                    
                    <!-- Booking Form -->
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <form @submit.prevent="submitBooking" class="space-y-6">
                            <!-- Dates -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-700 mb-2">Check-in Date</label>
                                    <input 
                                        type="date" 
                                        v-model="booking.checkIn"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                                        required
                                    >
                                </div>
                                <div>
                                    <label class="block text-gray-700 mb-2">Check-out Date</label>
                                    <input 
                                        type="date" 
                                        v-model="booking.checkOut"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Guest Information -->
                            <div>
                                <label class="block text-gray-700 mb-2">Number of Guests</label>
                                <select 
                                    v-model="booking.guests"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                                    required
                                >
                                    <option value="1">1 Guest</option>
                                    <option value="2">2 Guests</option>
                                    <option value="3">3 Guests</option>
                                    <option value="4">4 Guests</option>
                                </select>
                            </div>

                            <!-- Special Requests -->
                            <div>
                                <label class="block text-gray-700 mb-2">Special Requests</label>
                                <textarea 
                                    v-model="booking.specialRequests"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                                    rows="3"
                                    placeholder="Any special requests?"
                                ></textarea>
                            </div>

                            <!-- Payment Information -->
                            <div class="border-t pt-6">
                                <h3 class="text-xl font-semibold mb-4">Payment Information</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-gray-700 mb-2">Card Number</label>
                                        <input 
                                            type="text" 
                                            v-model="payment.cardNumber"
                                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                                            placeholder="1234 5678 9012 3456"
                                            required
                                        >
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-gray-700 mb-2">Expiry Date</label>
                                            <input 
                                                type="text" 
                                                v-model="payment.expiryDate"
                                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                                                placeholder="MM/YY"
                                                required
                                            >
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2">CVV</label>
                                            <input 
                                                type="text" 
                                                v-model="payment.cvv"
                                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                                                placeholder="123"
                                                required
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Price -->
                            <div class="border-t pt-6">
                                <div class="flex justify-between items-center text-xl font-semibold">
                                    <span>Total Price:</span>
                                    <span>${{ calculateTotal() }}</span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button 
                                    type="submit"
                                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors"
                                >
                                    Confirm Booking
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const booking = ref({
    checkIn: '',
    checkOut: '',
    guests: 2,
    specialRequests: '',
    roomType: 'deluxe' // You can pass this as a prop from the parent component if needed
});

const payment = ref({
    cardNumber: '',
    expiryDate: '',
    cvv: ''
});

const roomPrices = {
    deluxe: 199,
    suite: 299,
    presidential: 599
};

const calculateTotal = () => {
    const price = roomPrices[booking.value.roomType];
    // Add calculation for number of nights here
    return price;
};

const submitBooking = async () => {
    try {
        // Here you would typically make an API call to your backend
        console.log('Booking submitted:', { booking: booking.value, payment: payment.value });
        
        // Redirect to confirmation page using Inertia
        router.visit('/booking-confirmation');
    } catch (error) {
        console.error('Error submitting booking:', error);
    }
};
</script>
