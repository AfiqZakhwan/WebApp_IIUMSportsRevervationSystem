@extends('layouts.admin')
@section('page-title', 'Dashboard')

@section('content')
{{-- Stats cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    @php
        $cards = [
            ['label' => 'Total Students', 'value' => $stats['total_users'], 'color' => 'emerald', 'icon' => '👥'],
            ['label' => 'Total Revenue', 'value' => 'RM ' . number_format($stats['total_revenue'], 2), 'color' => 'blue', 'icon' => '💰'],
            ['label' => 'Total Bookings', 'value' => $stats['total_bookings'], 'color' => 'violet', 'icon' => '📅'],
            ['label' => 'Unpaid Bookings', 'value' => $stats['pending_unpaid'], 'color' => 'amber', 'icon' => '⏳'],
            ['label' => 'Active Venues', 'value' => $stats['active_venues'] . ' / ' . $stats['total_venues'], 'color' => 'teal', 'icon' => '🏟️'],
            ['label' => 'Equipment Types', 'value' => $stats['total_equipment'], 'color' => 'orange', 'icon' => '🎽'],
        ];
    @endphp

    @foreach($cards as $card)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $card['label'] }}</p>
                <span class="text-xl">{{ $card['icon'] }}</span>
            </div>
            <p class="text-2xl font-bold text-gray-900">{{ $card['value'] }}</p>
        </div>
    @endforeach
</div>

{{-- Recent Bookings --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <h2 class="font-semibold text-gray-800">Recent Bookings</h2>
        <a href="{{ route('admin.bookings.index') }}" class="text-sm text-emerald-600 hover:underline">View all →</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Booking</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Student</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Venue</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payment</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse($recentBookings as $booking)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3 font-medium text-gray-900">#{{ $booking->id }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->user->name ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->venue->name ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->booking_date }}</td>
                        <td class="px-6 py-3">
                            @if($booking->payment)
                                <span class="inline-flex items-center rounded-full bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-700">Paid</span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-amber-100 px-2 py-1 text-xs font-medium text-amber-700">Unpaid</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-6 text-center text-gray-500">No bookings yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
