<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private function calcTotal(Booking $booking, $rentals): array
    {
        $equipmentTotal = $rentals->sum('item_total');
        // Use venue's dynamic price_per_hour as base fee
        $baseFee = $booking->venue->price_per_hour ?? 2.00;
        $total   = $equipmentTotal + $baseFee;
        return compact('equipmentTotal', 'baseFee', 'total');
    }

    public function create($id)
    {
        $booking = Booking::with('venue')->findOrFail($id);

        // Security: only the booking owner can pay
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        // BUG FIX: prevent duplicate payment
        if ($booking->payment()->exists()) {
            return redirect()->route('bookings.index')
                ->with('flash.banner', 'This booking has already been paid.')
                ->with('flash.bannerStyle', 'success');
        }

        $rentals = Rental::with('equipment')->where('booking_id', $id)->get();
        ['equipmentTotal' => $equipmentTotal, 'baseFee' => $baseFee, 'total' => $total] = $this->calcTotal($booking, $rentals);

        return view('payments.create', compact('booking', 'rentals', 'equipmentTotal', 'baseFee', 'total'));
    }

    public function store(Request $request, $id)
    {
        $booking = Booking::with('venue')->findOrFail($id);

        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        // BUG FIX: prevent duplicate payment on re-submit
        if ($booking->payment()->exists()) {
            return redirect()->route('bookings.index')
                ->with('flash.banner', 'This booking has already been paid.')
                ->with('flash.bannerStyle', 'success');
        }

        $rentals = Rental::with('equipment')->where('booking_id', $id)->get();
        ['equipmentTotal' => $equipmentTotal, 'baseFee' => $baseFee, 'total' => $total] = $this->calcTotal($booking, $rentals);

        $request->validate([
            'payment_method' => 'required|in:online_banking,credit_card,debit_card,ewallet',
        ]);

        Payment::create([
            'booking_id'     => $booking->id,
            'amount'         => $total,
            'payment_date'   => now()->toDateString(),
            'payment_method' => $request->payment_method,
            'status'         => 'paid',
        ]);

        return redirect()->route('bookings.index')
            ->with('flash.banner', 'Payment successful for RM' . number_format($total, 2) . '. Your booking is confirmed!')
            ->with('flash.bannerStyle', 'success');
    }
}
