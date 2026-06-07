@extends('layouts.admin')
@section('page-title', 'Equipment')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-gray-800">All Equipment</h2>
    <a href="{{ route('admin.equipment.create') }}" class="inline-flex items-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 transition">
        + Add Equipment
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sport Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price/Unit</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Qty Available</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @forelse($equipment as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $item->name }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $item->sport_type }}</td>
                    <td class="px-6 py-4 text-gray-700">RM {{ number_format($item->price_per_unit, 2) }}</td>
                    <td class="px-6 py-4">
                        <span class="{{ $item->quantity_available < 3 ? 'text-red-600 font-semibold' : 'text-gray-700' }}">
                            {{ $item->quantity_available }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.equipment.edit', $item) }}" class="text-xs px-3 py-1 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition">Edit</a>
                            <form method="POST" action="{{ route('admin.equipment.destroy', $item) }}" onsubmit="return confirm('Delete this equipment?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-xs px-3 py-1 rounded-lg border border-red-300 text-red-600 hover:bg-red-50 transition">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-6 text-center text-gray-500">No equipment found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
