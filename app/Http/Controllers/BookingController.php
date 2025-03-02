<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->bookings()->latest()->get();
        
        return Inertia::render('Profile/Bookings', [
            'bookings' => $bookings
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel' => 'required|string',
            'room_type' => 'required|string',
            'guest_name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'days_of_stay' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'total_price' => 'required|numeric|min:0',
            'special_requests' => 'nullable|string',
        ]);

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'hotel' => (string) $validated['hotel'],
            'room_type' => $validated['room_type'],
            'guest_name' => $validated['guest_name'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'check_in_date' => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'days_of_stay' => $validated['days_of_stay'],
            'payment_method' => $validated['payment_method'],
            'total_price' => $validated['total_price'],
            'special_requests' => $validated['special_requests'],
            'status' => 'pending',
        ]);

        return redirect()->route('profile.bookings')->with('success', 'Booking confirmed successfully!');
    }

    public function confirmation(Booking $booking)
    {
        return Inertia::render('BookingConfirmation', [
            'booking' => $booking
        ]);
    }
}
