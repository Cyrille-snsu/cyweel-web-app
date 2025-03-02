<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Booking;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function loginForm()
    {
        return Inertia::render('Admin/Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        $users = User::count();
        $bookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $hotels = Hotel::count();

        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'users' => $users,
                'bookings' => $bookings,
                'pendingBookings' => $pendingBookings,
                'hotels' => $hotels,
            ]
        ]);
    }

    public function users()
    {
        return Inertia::render('Admin/Users', [
            'users' => User::orderBy('id', 'asc')->paginate(10)
        ]);
    }

    public function bookings()
    {
        return Inertia::show('Admin/Bookings', [
            'bookings' => Booking::with('user')->orderBy('id', 'asc')->paginate(10)
        ]);
    }

    public function approveBooking(Booking $booking)
    {
        $booking->update(['status' => 'confirmed']);
        return back()->with('success', 'Booking approved successfully');
    }

    public function rejectBooking(Booking $booking)
    {
        $booking->update(['status' => 'rejected']);
        return back()->with('success', 'Booking rejected successfully');
    }

    public function hotels()
    {
        return Inertia::render('Admin/Hotels', [
            'hotels' => Hotel::orderBy('id', 'asc')->paginate(10)
        ]);
    }

    public function storeHotel(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('hotels', 'public');
        
        Hotel::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'image' => $imagePath,
        ]);

        return back()->with('success', 'Hotel added successfully');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
