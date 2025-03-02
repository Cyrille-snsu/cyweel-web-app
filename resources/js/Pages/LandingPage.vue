<template>
    <MainLayout>
        <!-- Hero Section -->
        <div class="relative h-screen">
            <div class="absolute inset-0">
                <img src="/images/cyweel photos/bg.jpg" class="w-full h-full object-cover" alt="Cyweel Hotel">
                <div class="absolute inset-0 bg-black opacity-50"></div>
            </div>
            <div class="relative flex items-center justify-center h-full text-center text-white">
                <div>
                    <h1 class="text-5xl font-bold mb-4">Welcome to Cyweel Hotels</h1>
                    <p class="text-xl mb-8">Experience the ultimate in comfort and elegance</p>
                    <div class="space-x-4">
                        <Link v-if="!$page.props.auth.user" 
                              href="/register" 
                              class="bg-blue-600 text-white px-8 py-3 rounded-md text-lg hover:bg-blue-700 inline-block">
                            Book Now
                        </Link>
        
                        <div v-if="$page.props.auth.user" class="mt-8">
                            <Link
                                :href="route('choose.hotel')"
                                class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
                            >
                                Book Your Stay
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center mb-12">About Our Hotel</h2>
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <img src="/images/cyweel photos/interior.jpg" class="rounded-lg shadow-lg" alt="Hotel Interior">
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold mb-4">Luxury Redefined</h3>
                        <p class="text-gray-600 mb-6">
                            Experience unparalleled luxury in our carefully crafted rooms and suites. 
                            Each space is designed to provide the ultimate comfort and relaxation, 
                            featuring premium amenities and stunning views.
                        </p>
                        <Link href="/about" class="text-blue-600 hover:text-blue-800 font-semibold">
                            Learn More →
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center mb-12">Our Rooms</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Luxury Room -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="/images/cyweel photos/luxury.jpg" alt="Luxury Room" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-2">Luxury Room</h3>
                            <p class="text-gray-600 mb-4">Experience ultimate comfort and elegance.</p>
                            <button @click="openModal('luxury')" class="text-blue-600 hover:text-blue-800 font-semibold">
                                View Details
                            </button>
                        </div>
                    </div>

                    <!-- Suite Room -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="/images/cyweel photos/suite.jpg" alt="Suite Room" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-2">Suite Room</h3>
                            <p class="text-gray-600 mb-4">Perfect blend of comfort and luxury.</p>
                            <button @click="openModal('suite')" class="text-blue-600 hover:text-blue-800 font-semibold">
                                View Details
                            </button>
                        </div>
                    </div>

                    <!-- Premium Room -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="/images/cyweel photos/presedential.jpg" alt="Premium Room" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-2">Premium Room</h3>
                            <p class="text-gray-600 mb-4">Elevated comfort with premium amenities.</p>
                            <button @click="openModal('premium')" class="text-blue-600 hover:text-blue-800 font-semibold">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-20 bg-blue-600">
            <div class="container mx-auto px-4 text-center text-white">
                <h2 class="text-4xl font-bold mb-4">Ready to Experience Luxury?</h2>
                <p class="text-xl mb-8">Book your stay today and enjoy our premium amenities</p>
                <div class="space-x-4">
                    <Link v-if="!$page.props.auth.user" 
                          href="/register" 
                          class="bg-white text-blue-600 px-8 py-3 rounded-md text-lg hover:bg-gray-100 inline-block">
                        Register Now
                    </Link>
                    <div v-else class="mt-8">
                        <Link
                            :href="route('choose.hotel')"
                            class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors"
                        >
                            View Rooms
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Room Details Modal -->
        <TransitionRoot appear :show="isModalOpen" as="template">
            <Dialog as="div" @close="closeModal" class="relative z-10">
                <TransitionChild
                    as="template"
                    enter="duration-300 ease-out"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="duration-200 ease-in"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <div class="fixed inset-0 bg-black bg-opacity-25" />
                </TransitionChild>

                <div class="fixed inset-0 overflow-y-auto pt-16">
                    <div class="flex min-h-full items-center justify-center p-4 text-center">
                        <TransitionChild
                            as="template"
                            enter="duration-300 ease-out"
                            enter-from="opacity-0 scale-95"
                            enter-to="opacity-100 scale-100"
                            leave="duration-200 ease-in"
                            leave-from="opacity-100 scale-100"
                            leave-to="opacity-0 scale-95"
                        >
                            <DialogPanel class="w-full max-w-2xl transform overflow-hidden rounded-2xl bg-white text-left align-middle shadow-xl transition-all">
                                <div class="relative">
                                    <img 
                                        :src="selectedRoom === 'premium' ? '/images/cyweel photos/presedential.jpg' : `/images/cyweel photos/${selectedRoom}.jpg`" 
                                        :alt="selectedRoom" 
                                        class="w-full h-64 object-cover"
                                    >
                                    <div class="absolute top-0 right-0 p-4">
                                        <button
                                            type="button"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-black bg-opacity-50 p-2 text-white hover:bg-opacity-75 focus:outline-none"
                                            @click="closeModal"
                                        >
                                            <span class="sr-only">Close</span>
                                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="max-h-[calc(100vh-16rem)] overflow-y-auto p-6">
                                    <DialogTitle as="h3" class="text-2xl font-bold leading-6 text-gray-900 mb-4">
                                        {{ selectedRoom ? roomDetails[selectedRoom].title : '' }}
                                    </DialogTitle>

                                    <p class="text-gray-600 mb-6">{{ selectedRoom ? roomDetails[selectedRoom].description : '' }}</p>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <h4 class="font-semibold text-gray-900 mb-2">Amenities:</h4>
                                            <ul class="grid grid-cols-2 gap-2">
                                                <li v-for="amenity in (selectedRoom ? roomDetails[selectedRoom].amenities : [])" 
                                                    :key="amenity"
                                                    class="flex items-center text-gray-600"
                                                >
                                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                    {{ amenity }}
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="pt-4 border-t">
                                            <p class="font-semibold text-gray-900">Price: 
                                                <span class="text-blue-600 text-xl">₱{{ selectedRoom ? roomDetails[selectedRoom].price : '' }}/night</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="mt-6 flex justify-end space-x-4">
                                        <button
                                            type="button"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-gray-100 px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200 focus:outline-none"
                                            @click="closeModal"
                                        >
                                            Close
                                        </button>
                                        <Link
                                            :href="route('choose.hotel')"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none"
                                        >
                                            Book Now
                                        </Link>
                                    </div>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue';

const isModalOpen = ref(false);
const selectedRoom = ref(null);

const roomDetails = {
    luxury: {
        title: 'Luxury Room',
        description: 'Experience the epitome of luxury in our signature room. This spacious accommodation features premium furnishings, a stunning view, and exclusive amenities that ensure an unforgettable stay.',
        price: '2,500',
        amenities: [
            'King Size Bed',
            'Ocean or City View',
            'Premium Air Conditioning',
            'High-speed WiFi',
            '65" Smart TV',
            'Mini Bar',
            'Luxury Bathroom with Jacuzzi',
            'Walk-in Closet',
            '24/7 Room Service',
            'Access to Executive Lounge',
            'Premium Toiletries',
            'Coffee Machine',
            'Private Balcony'
        ]
    },
    suite: {
        title: 'Suite Room',
        description: 'Our elegant Suite Room offers a perfect blend of comfort and sophistication. Ideal for those seeking extra space and premium amenities, with separate living and sleeping areas.',
        price: '1,800',
        amenities: [
            'Queen Size Bed',
            'Separate Living Area',
            'City View',
            'Air Conditioning',
            '55" Smart TV',
            'Mini Kitchen',
            'Spacious Bathroom',
            'Work Desk',
            'High-speed WiFi',
            'Daily Housekeeping',
            'Room Service',
            'Coffee and Tea Facilities'
        ]
    },
    premium: {
        title: 'Premium Room',
        description: 'The Premium Room delivers an elevated hotel experience with carefully curated amenities and modern comforts. Perfect for business travelers or couples seeking quality accommodation.',
        price: '1,500',
        amenities: [
            'Queen Size Bed',
            'City View',
            'Air Conditioning',
            'High-speed WiFi',
            '50" Smart TV',
            'En-suite Bathroom',
            'Work Station',
            'Mini Refrigerator',
            'In-room Safe',
            'Daily Housekeeping',
            'Premium Toiletries'
        ]
    }
};

const openModal = (room) => {
    selectedRoom.value = room;
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
    selectedRoom.value = null;
};
</script>

<style scoped>
.container {
    max-width: 1200px;
}
</style>
