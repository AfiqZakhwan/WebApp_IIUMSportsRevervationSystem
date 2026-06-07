<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Equipment;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    public function create($id)
    {
        $booking = Booking::with('venue')->findOrFail($id);

        $equipment = Equipment::where('sport_type', $booking->venue->sport_type)
            ->where('quantity_available', '>', 0)
            ->get();

        return view('rentals.create', compact('booking', 'equipment'));
    }

    public function store(Request $request, $id)
    {
        $booking = Booking::with('venue')->findOrFail($id);

        $request->validate([
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:0',
        ]);

        $selectedQuantities = collect($request->input('quantities', []))
            ->filter(fn($quantity) => $quantity > 0)
            ->map(fn($quantity) => (int) $quantity);

        if ($selectedQuantities->isEmpty()) {
            // No equipment selected — proceed to payment for the booking.
            $baseFee = 2.00;
            $subtotal = 0.00;
            $total = $subtotal + $baseFee;

            return redirect()->route('payment.create', $booking->id)
                ->with('flash.banner', 'Proceed to payment. Total charge: RM' . number_format($total, 2))
                ->with('flash.bannerStyle', 'success');
        }

        $equipmentItems = Equipment::whereIn('id', $selectedQuantities->keys()->toArray())
            ->where('sport_type', $booking->venue->sport_type)
            ->get()
            ->keyBy('id');

        $validRentals = [];
        $subtotal = 0;

        foreach ($selectedQuantities as $equipmentId => $quantity) {
            $equipmentId = (int) $equipmentId;
            $item = $equipmentItems->get($equipmentId);

            if (!$item) {
                return back()->withErrors(['rental' => 'Selected equipment is not available for this sport type.'])->withInput();
            }

            if ($quantity > $item->quantity_available) {
                return back()->withErrors(['rental' => "Only {$item->quantity_available} units of {$item->name} are available. Please reduce the quantity."])->withInput();
            }

            $lineTotal = $item->price_per_unit * $quantity;
            $subtotal += $lineTotal;

            $validRentals[] = [
                'equipment' => $item,
                'quantity' => $quantity,
                'unit_price' => $item->price_per_unit,
                'total_price' => $lineTotal,
            ];
        }

        $baseFee = 2.00;
        $total = $subtotal + $baseFee;

        DB::transaction(function () use ($booking, $validRentals) {
            foreach ($validRentals as $rentalData) {
                Rental::create([
                    'booking_id' => $booking->id,
                    'equipment_id' => $rentalData['equipment']->id,
                    'quantity' => $rentalData['quantity'],
                    'unit_price' => $rentalData['unit_price'],
                    'item_total' => $rentalData['total_price'],
                ]);

                $rentalData['equipment']->decrement('quantity_available', $rentalData['quantity']);
            }
        });

        // FIXED
        return redirect()->route('payment.create', $booking->id)->with('success', 'Rental saved! Please complete your payment.');
    }
}
