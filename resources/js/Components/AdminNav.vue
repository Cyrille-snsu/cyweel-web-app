<template>
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <Link :href="route('admin.dashboard')" class="text-black font-bold text-xl">
                            🏨
                        </Link>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <Link
                                :href="route('admin.dashboard')"
                                :class="[
                                    route().current('admin.dashboard')
                                        ? 'bg-black text-white'
                                        : 'text-black hover:bg-gray-100',
                                    'px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200'
                                ]"
                            >
                                    Dashboard
                            </Link>

                            <Link
                                :href="route('admin.users')"
                                :class="[
                                    route().current('admin.users')
                                        ? 'bg-black text-white'
                                        : 'text-black hover:bg-gray-100',
                                    'px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200'
                                ]"
                            >
                                Users
                            </Link>

                            <Link
                                :href="route('admin.bookings')"
                                :class="[
                                    route().current('admin.bookings')
                                        ? 'bg-black text-white'
                                        : 'text-black hover:bg-gray-100',
                                    'px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200'
                                ]"
                            >
                                Bookings
                            </Link>

                            <Link
                                :href="route('admin.hotels')"
                                :class="[
                                    route().current('admin.hotels')
                                        ? 'bg-black text-white'
                                        : 'text-black hover:bg-gray-100',
                                    'px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200'
                                ]"
                            >
                                Hotels
                            </Link>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <form @submit.prevent="logout">
                            <button
                                type="submit"
                                class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200"
                            >
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <Link
                    :href="route('admin.dashboard')"
                    :class="[
                        route().current('admin.dashboard')
                            ? 'bg-black text-white'
                            : 'text-black hover:bg-gray-100',
                        'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200'
                    ]"
                >
                    Dashboard
                </Link>

                <Link
                    :href="route('admin.users')"
                    :class="[
                        route().current('admin.users')
                            ? 'bg-black text-white'
                            : 'text-black hover:bg-gray-100',
                        'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200'
                    ]"
                >
                    Users
                </Link>

                <Link
                    :href="route('admin.bookings')"
                    :class="[
                        route().current('admin.bookings')
                            ? 'bg-black text-white'
                            : 'text-black hover:bg-gray-100',
                        'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200'
                    ]"
                >
                    Bookings
                </Link>

                <Link
                    :href="route('admin.hotels')"
                    :class="[
                        route().current('admin.hotels')
                            ? 'bg-black text-white'
                            : 'text-black hover:bg-gray-100',
                        'block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200'
                    ]"
                >
                    Hotels
                </Link>

                <form @submit.prevent="logout" class="block">
                    <button
                        type="submit"
                        class="w-full text-left text-gray-600 hover:bg-gray-100 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200"
                    >
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';

const logout = () => {
    router.post(route('admin.logout'));
};
</script>
