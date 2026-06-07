<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        // BUG FIX: only show available venues to students
        $venues = Venue::available()->get();
        return view('dashboard', compact('venues'));
    }

    public function myBookings()
    {
        $bookings = Booking::with(['venue', 'rentals.equipment', 'payment'])
            ->where('user_id', Auth::id())
            ->orderBy('booking_date', 'desc')
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        $venue = Venue::findOrFail($request->query('venue_id'));

        // BUG FIX: block booking if venue is unavailable
        if (!$venue->is_available) {
            return redirect()->route('dashboard')
                ->with('flash.banner', 'This venue is currently unavailable.')
                ->with('flash.bannerStyle', 'danger');
        }

        return view('bookings.create', compact('venue'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'venue_id'     => 'required|exists:venues,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'start_time'   => 'required|date_format:H:i',
            'end_time'     => 'required|date_format:H:i|after:start_time',
        ]);

        $venue = Venue::findOrFail($request->venue_id);

        // BUG FIX: re-check availability at store time too
        if (!$venue->is_available) {
            return redirect()->back()
                ->withErrors(['venue' => 'This venue is currently unavailable for booking.'])
                ->withInput();
        }

        $startTime = Carbon::parse($request->start_time);
        $endTime   = Carbon::parse($request->end_time);

        $prayerStart = Carbon::parse('19:00');
        $prayerEnd   = Carbon::parse('21:00');

        if ($startTime->lt($prayerEnd) && $endTime->gt($prayerStart)) {
            return redirect()->back()
                ->withErrors(['time' => 'Reservations are strictly closed between 7:00 PM and 9:00 PM to honor congregational prayers.'])
                ->withInput();
        }

        $isDoubleBooked = Booking::where('venue_id', $request->venue_id)
            ->where('booking_date', $request->booking_date)
            ->where(function ($query) use ($request) {
                $query->where('start_time', '<', $request->end_time)
                      ->where('end_time', '>', $request->start_time);
            })->exists();

        if ($isDoubleBooked) {
            return redirect()->back()
                ->withErrors(['conflict' => 'This court/facility is already reserved for the selected time slot.'])
                ->withInput();
        }

        if ($startTime->diffInHours($endTime) > 2) {
            return redirect()->back()
                ->withErrors(['limit' => 'Fair-use policy limits bookings to a maximum of 2 hours per session.'])
                ->withInput();
        }

        $booking = Booking::create([
            'user_id'      => Auth::id(),
            'venue_id'     => $request->venue_id,
            'booking_date' => $request->booking_date,
            'start_time'   => $request->start_time,
            'end_time'     => $request->end_time,
        ]);

        return redirect()->route('rental.create', $booking->id)
            ->with('success', 'Venue held! Please select your rental gear.');
    }

    public function destroy($id)
    {
        $booking = Booking::with('rentals.equipment')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        DB::transaction(function () use ($booking) {
            foreach ($booking->rentals as $rental) {
                if ($rental->equipment) {
                    $rental->equipment->increment('quantity_available', $rental->quantity);
                }
            }
            $booking->delete();
        });

        return redirect()->route('bookings.index')
            ->with('flash.banner', 'Booking cancelled and rented equipment returned to inventory.')
            ->with('flash.bannerStyle', 'success');
    }
}
