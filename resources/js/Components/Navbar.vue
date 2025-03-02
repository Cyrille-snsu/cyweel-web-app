<template>
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <Link :href="$page.props.auth.user ? route('dashboard') : '/'" class="flex items-center space-x-2">
                        <img src="/images/cyweel photos/navbarlogo.png" alt="Cyweel Hotel" class="h-10 w-auto">
                        <span class="text-2xl font-bold text-gray-800">Cyweel Hotel</span>
                    </Link>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <Link :href="$page.props.auth.user ? route('dashboard') : '/'" class="text-gray-600 hover:text-gray-900">Home</Link>
                    
                    <template v-if="!$page.props.auth.user">
                        <Link href="/about" class="text-gray-600 hover:text-gray-900">About</Link>
                        <Link href="/rooms" class="text-gray-600 hover:text-gray-900">Rooms</Link>
                        <Link href="/gallery" class="text-gray-600 hover:text-gray-900">Gallery</Link>
                        <Link href="/login" class="text-gray-600 hover:text-gray-900">Login</Link>
                        <Link href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Register
                        </Link>
                    </template>

                    <!-- Authenticated Links -->
                    <template v-else>
                        <div class="relative" @click="toggleDropdown" @keydown.escape="isOpen = false">
                            <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-900 focus:outline-none">
                                <span>{{ $page.props.auth.user.name }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div v-show="isOpen" 
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                                <Link href="/bookings" 
                                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    My Bookings
                                </Link>
                                <Link href="/profile" 
                                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Profile
                                </Link>
                                <button @click="logout" 
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button @click="toggleMobileMenu" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path v-if="!isMobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div v-show="isMobileMenuOpen" class="md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <Link :href="$page.props.auth.user ? route('dashboard') : '/'" class="block px-3 py-2 text-gray-600 hover:text-gray-900">Home</Link>
                    
                    <template v-if="!$page.props.auth.user">
                        <Link href="/about" class="block px-3 py-2 text-gray-600 hover:text-gray-900">About</Link>
                        <Link href="/rooms" class="block px-3 py-2 text-gray-600 hover:text-gray-900">Rooms</Link>
                        <Link href="/gallery" class="block px-3 py-2 text-gray-600 hover:text-gray-900">Gallery</Link>
                        <Link href="/login" class="block px-3 py-2 text-gray-600 hover:text-gray-900">Login</Link>
                        <Link href="/register" class="block px-3 py-2 text-gray-600 hover:text-gray-900">Register</Link>
                    </template>
                    <template v-else>
                        <Link href="/bookings" class="block px-3 py-2 text-gray-600 hover:text-gray-900">My Bookings</Link>
                        <Link href="/profile" class="block px-3 py-2 text-gray-600 hover:text-gray-900">Profile</Link>
                        <button @click="logout" class="w-full text-left px-3 py-2 text-gray-600 hover:text-gray-900">
                            Logout
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';

const isOpen = ref(false);
const isMobileMenuOpen = ref(false);

const toggleDropdown = () => {
    isOpen.value = !isOpen.value;
};

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
};

const logout = () => {
    router.post('/logout');
};
</script>
