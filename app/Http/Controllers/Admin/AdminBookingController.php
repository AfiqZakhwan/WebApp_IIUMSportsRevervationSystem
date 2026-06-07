<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'venue', 'payment', 'rentals.equipment'])->latest();

        if ($request->filled('venue_id')) {
            $query->where('venue_id', $request->venue_id);
        }
        if ($request->filled('date')) {
            $query->where('booking_date', $request->date);
        }

        $bookings = $query->paginate(15);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function destroy($id)
    {
        $booking = Booking::with('rentals.equipment')->findOrFail($id);

        \DB::transaction(function () use ($booking) {
            foreach ($booking->rentals as $rental) {
                if ($rental->equipment) {
                    $rental->equipment->increment('quantity_available', $rental->quantity);
                }
            }
            $booking->delete();
        });

        return back()->with('success', 'Booking deleted and inventory restored.');
    }
}
