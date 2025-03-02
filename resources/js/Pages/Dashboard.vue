<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <MainLayout>
        <!-- Hero Section -->
        <div class="relative min-h-screen">
            <div class="absolute inset-0">
                <img src="/images/cyweel photos/bg.jpg" class="w-full h-full object-cover" alt="Cyweel Hotel">
                <div class="absolute inset-0 bg-black opacity-50"></div>
            </div>
            <div class="relative flex items-center justify-center min-h-screen text-center text-white py-20">
                <div class="w-full max-w-7xl px-4">
                    <h1 class="text-5xl font-bold mb-4">Welcome Back, {{ $page.props.auth.user.name }}!</h1>
                    <p class="text-xl mb-16">What would you like to do today?</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Book Now Button Group -->
                        <div class="text-center">
                            <Link 
                                :href="route('choose.hotel')"
                                class="w-full bg-blue-600 text-white px-6 py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition-colors mb-3 inline-block"
                            >
                                Book Now
                            </Link>
                            <p class="text-gray-300">
                                Ready to experience luxury? Browse our selection of premium rooms and suites for your next stay.
                            </p>
                        </div>
                        
                        <!-- Booking History Button Group -->
                        <div class="text-center">
                            <Link 
                                :href="route('profile.bookings')"
                                class="w-full bg-white text-blue-600 px-6 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors mb-3 inline-block"
                            >
                                View Bookings
                            </Link>
                            <p class="text-gray-300">
                                Check your past stays and upcoming reservations. Manage or modify your bookings with ease.
                            </p>
                        </div>
                        
                        <!-- Profile Button Group -->
                        <div class="text-center">
                            <Link 
                                :href="route('profile.edit')"
                                class="w-full bg-purple-600 text-white px-6 py-4 rounded-lg text-lg font-semibold hover:bg-purple-700 transition-colors mb-3 inline-block"
                            >
                                My Profile
                            </Link>
                            <p class="text-gray-300">
                                Update your personal information, manage your preferences, and customize your experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<style scoped>
.container {
    max-width: 1200px;
}
</style>
