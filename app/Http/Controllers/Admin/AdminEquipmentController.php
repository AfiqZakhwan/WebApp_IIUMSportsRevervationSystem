<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class AdminEquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::latest()->get();
        return view('admin.equipment.index', compact('equipment'));
    }

    public function create()
    {
        return view('admin.equipment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'               => 'required|string|max:255',
            'sport_type'         => 'required|string|max:100',
            'description'        => 'nullable|string',
            'price_per_unit'     => 'required|numeric|min:0',
            'quantity_available' => 'required|integer|min:0',
        ]);

        Equipment::create($request->only([
            'name', 'sport_type', 'description', 'price_per_unit', 'quantity_available'
        ]));

        return redirect()->route('admin.equipment.index')
            ->with('success', 'Equipment added successfully.');
    }

    public function edit(Equipment $equipment)
    {
        return view('admin.equipment.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $request->validate([
            'name'               => 'required|string|max:255',
            'sport_type'         => 'required|string|max:100',
            'description'        => 'nullable|string',
            'price_per_unit'     => 'required|numeric|min:0',
            'quantity_available' => 'required|integer|min:0',
        ]);

        $equipment->update($request->only([
            'name', 'sport_type', 'description', 'price_per_unit', 'quantity_available'
        ]));

        return redirect()->route('admin.equipment.index')
            ->with('success', 'Equipment updated successfully.');
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('admin.equipment.index')
            ->with('success', 'Equipment deleted.');
    }
}
