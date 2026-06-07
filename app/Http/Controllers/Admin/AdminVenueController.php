<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;

class AdminVenueController extends Controller
{
    public function index()
    {
        $venues = Venue::withCount('bookings')->latest()->get();
        return view('admin.venues.index', compact('venues'));
    }

    public function create()
    {
        return view('admin.venues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'sport_type'    => 'required|string|max:100',
            'description'   => 'nullable|string',
            'price_per_hour'=> 'required|numeric|min:0',
            'is_available'  => 'boolean',
        ]);

        Venue::create([
            'name'           => $request->name,
            'sport_type'     => $request->sport_type,
            'description'    => $request->description,
            'price_per_hour' => $request->price_per_hour,
            'is_available'   => $request->boolean('is_available', true),
        ]);

        return redirect()->route('admin.venues.index')
            ->with('success', 'Venue created successfully.');
    }

    public function edit(Venue $venue)
    {
        return view('admin.venues.edit', compact('venue'));
    }

    public function update(Request $request, Venue $venue)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'sport_type'    => 'required|string|max:100',
            'description'   => 'nullable|string',
            'price_per_hour'=> 'required|numeric|min:0',
            'is_available'  => 'boolean',
        ]);

        $venue->update([
            'name'           => $request->name,
            'sport_type'     => $request->sport_type,
            'description'    => $request->description,
            'price_per_hour' => $request->price_per_hour,
            'is_available'   => $request->boolean('is_available'),
        ]);

        return redirect()->route('admin.venues.index')
            ->with('success', 'Venue updated successfully.');
    }

    public function destroy(Venue $venue)
    {
        $venue->delete();
        return redirect()->route('admin.venues.index')
            ->with('success', 'Venue deleted.');
    }

    public function toggleAvailability(Venue $venue)
    {
        $venue->update(['is_available' => !$venue->is_available]);
        $status = $venue->is_available ? 'available' : 'unavailable';
        return back()->with('success', "Venue marked as {$status}.");
    }
}
