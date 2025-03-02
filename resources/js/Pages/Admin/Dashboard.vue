<template>
    <div class="min-h-screen bg-white">
        <header class="bg-black">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-white">Admin Dashboard</h1>
            </div>
        </header>

        <AdminNav />
        
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Welcome Message -->
                <div class="bg-blue-600 rounded-lg shadow-lg p-6 mb-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-white mb-2">Welcome to Your Dashboard</h2>
                            <p class="text-blue-100">Manage your hotel bookings and users all in one place.</p>
                        </div>
                        <div class="hidden md:block">
                            <span class="text-white text-lg">{{ new Date().toLocaleDateString() }}</span>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <!-- Users Card -->
                    <div class="bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105">
                        <div class="p-6 bg-gradient-to-r from-purple-500 to-purple-600">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-purple-100">Total Users</p>
                                    <p class="text-3xl font-bold text-white mt-2">{{ stats.users }}</p>
                                </div>
                                <div class="rounded-full p-3 bg-purple-400 bg-opacity-30">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-6">
                                <Link :href="route('admin.users')" class="text-purple-100 hover:text-white text-sm font-medium flex items-center">
                                    View Details
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </Link>
                            </div>
                        </div>
                    </div>

                    <!-- Bookings Card -->
                    <div class="bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105">
                        <div class="p-6 bg-gradient-to-r from-green-500 to-green-600">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-green-100">Total Bookings</p>
                                    <p class="text-3xl font-bold text-white mt-2">{{ stats.bookings }}</p>
                                </div>
                                <div class="rounded-full p-3 bg-green-400 bg-opacity-30">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-6">
                                <Link :href="route('admin.bookings')" class="text-green-100 hover:text-white text-sm font-medium flex items-center">
                                    View Details
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </Link>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Bookings Card -->
                    <div class="bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105">
                        <div class="p-6 bg-gradient-to-r from-yellow-500 to-yellow-600">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-yellow-100">Pending Approvals</p>
                                    <p class="text-3xl font-bold text-white mt-2">{{ stats.pendingBookings }}</p>
                                </div>
                                <div class="rounded-full p-3 bg-yellow-400 bg-opacity-30">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-6">
                                <Link :href="route('admin.bookings')" class="text-yellow-100 hover:text-white text-sm font-medium flex items-center">
                                    Review Now
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </Link>
                            </div>
                        </div>
                    </div>

                    <!-- Hotels Card -->
                    <div class="bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105">
                        <div class="p-6 bg-gradient-to-r from-red-500 to-red-600">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-red-100">Total Hotels</p>
                                    <p class="text-3xl font-bold text-white mt-2">{{ stats.hotels }}</p>
                                </div>
                                <div class="rounded-full p-3 bg-red-400 bg-opacity-30">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-6">
                                <Link :href="route('admin.hotels')" class="text-red-100 hover:text-white text-sm font-medium flex items-center">
                                    Manage Hotels
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-800 mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <Link :href="route('admin.hotels')" 
                            class="flex items-center p-4 bg-white rounded-lg shadow-md hover:bg-gray-50 transition-colors duration-200">
                            <div class="p-3 bg-blue-500 rounded-full">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">Add New Hotel</p>
                                <p class="text-sm text-gray-500">Create a new hotel listing</p>
                            </div>
                        </Link>

                        <Link :href="route('admin.bookings')" 
                            class="flex items-center p-4 bg-white rounded-lg shadow-md hover:bg-gray-50 transition-colors duration-200">
                            <div class="p-3 bg-green-500 rounded-full">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">Review Bookings</p>
                                <p class="text-sm text-gray-500">Approve pending bookings</p>
                            </div>
                        </Link>

                        <Link :href="route('admin.users')" 
                            class="flex items-center p-4 bg-white rounded-lg shadow-md hover:bg-gray-50 transition-colors duration-200">
                            <div class="p-3 bg-purple-500 rounded-full">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">Manage Users</p>
                                <p class="text-sm text-gray-500">View and manage users</p>
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import AdminNav from '@/Components/AdminNav.vue';

defineProps({
    stats: {
        type: Object,
        required: true
    }
});
</script>
