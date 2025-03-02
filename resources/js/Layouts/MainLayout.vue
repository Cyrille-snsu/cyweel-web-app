<template>
    <div class="min-h-screen bg-gray-100">
        <Navbar />
        <main>
            <slot></slot>
        </main>
        <footer class="bg-gray-800 text-white py-8">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 Luxury Hotels. All rights reserved.</p>
            </div>
        </footer>
    </div>
</template>

<script setup>
import Navbar from '@/Components/Navbar.vue';
</script>
