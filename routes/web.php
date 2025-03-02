<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController; // Added this line
use App\Models\Hotel; // Added this line
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

Route::get('/', function () {
    return Inertia::render('LandingPage');
});

Route::get('/about', function () {
    return Inertia::render('About');
});

Route::get('/rooms', function () {
    return Inertia::render('Rooms');
})->name('rooms');

Route::get('/gallery', function () {
    return Inertia::render('Gallery');
})->name('gallery');

Route::middleware(['auth'])->group(function () {
    // Dashboard Route
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Hotel Booking Routes
    Route::get('/choose-hotel', function () {
        return Inertia::render('ChooseHotel', [
            'hotels' => Hotel::latest()->get()
        ]);
    })->name('choose.hotel');

    Route::get('/choose-room', function (Request $request) {
        return Inertia::render('ChooseRoom', [
            'hotel' => $request->hotel
        ]);
    })->name('choose.room');

    Route::get('/checkout', function (Request $request) {
        return Inertia::render('Checkout', [
            'hotel' => $request->hotel,
            'room' => $request->room,
            'price' => $request->price
        ]);
    })->name('checkout');

    Route::post('/bookings', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
    Route::get('/booking/confirmation/{booking}', [BookingController::class, 'confirmation'])->name('booking.confirmation');
    
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/bookings', [ProfileController::class, 'bookings'])->name('profile.bookings');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('login', [AdminController::class, 'login'])->name('login.post');
    
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('users', [AdminController::class, 'users'])->name('users');
        Route::get('bookings', [AdminController::class, 'bookings'])->name('bookings');
        Route::post('bookings/{booking}/approve', [AdminController::class, 'approveBooking'])->name('bookings.approve');
        Route::post('bookings/{booking}/reject', [AdminController::class, 'rejectBooking'])->name('bookings.reject');
        Route::get('hotels', [AdminController::class, 'hotels'])->name('hotels');
        Route::post('hotels', [AdminController::class, 'storeHotel'])->name('hotels.store');
        Route::post('logout', [AdminController::class, 'logout'])->name('logout');
    });
});

require __DIR__.'/auth.php';
