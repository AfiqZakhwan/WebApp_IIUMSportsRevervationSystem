<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Equipment;
use App\Models\Payment;
use App\Models\User;
use App\Models\Venue;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users'    => User::where('role', 'student')->count(),
            'total_venues'   => Venue::count(),
            'total_bookings' => Booking::count(),
            'total_revenue'  => Payment::where('status', 'paid')->sum('amount'),
            'active_venues'  => Venue::where('is_available', true)->count(),
            'total_equipment'=> Equipment::count(),
            'pending_unpaid' => Booking::whereDoesntHave('payment')->count(),
        ];

        $recentBookings = Booking::with(['user', 'venue', 'payment'])
            ->latest()
            ->limit(8)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentBookings'));
    }
}
