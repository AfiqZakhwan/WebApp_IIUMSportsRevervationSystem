@extends('layouts.admin')
@section('page-title', 'Venues')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-gray-800">All Venues</h2>
    <a href="{{ route('admin.venues.create') }}" class="inline-flex items-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 transition">
        + Add Venue
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sport Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price/Hour</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bookings</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @forelse($venues as $venue)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $venue->name }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $venue->sport_type }}</td>
                    <td class="px-6 py-4 text-gray-700">RM {{ number_format($venue->price_per_hour, 2) }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $venue->bookings_count }}</td>
                    <td class="px-6 py-4">
                        @if($venue->is_available)
                            <span class="inline-flex rounded-full bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-700">Available</span>
                        @else
                            <span class="inline-flex rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700">Unavailable</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2 flex-wrap">
                            <form method="POST" action="{{ route('admin.venues.toggle', $venue) }}">
                                @csrf
                                <button type="submit" class="text-xs px-3 py-1 rounded-lg border transition {{ $venue->is_available ? 'border-red-300 text-red-600 hover:bg-red-50' : 'border-emerald-300 text-emerald-600 hover:bg-emerald-50' }}">
                                    {{ $venue->is_available ? 'Disable' : 'Enable' }}
                                </button>
                            </form>
                            <a href="{{ route('admin.venues.edit', $venue) }}" class="text-xs px-3 py-1 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition">Edit</a>
                            <form method="POST" action="{{ route('admin.venues.destroy', $venue) }}" onsubmit="return confirm('Delete this venue?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-xs px-3 py-1 rounded-lg border border-red-300 text-red-600 hover:bg-red-50 transition">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-6 py-6 text-center text-gray-500">No venues found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
