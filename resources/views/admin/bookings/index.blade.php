@extends('layouts.admin')
@section('page-title', 'All Bookings')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <h2 class="text-xl font-bold text-gray-800">All Bookings</h2>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Student</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Venue</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Time</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payment</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @forelse($bookings as $booking)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">#{{ $booking->id }}</td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-gray-900">{{ $booking->user->name ?? '—' }}</p>
                        <p class="text-xs text-gray-500">{{ $booking->user->matric_number ?? '' }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-gray-900">{{ $booking->venue->name ?? '—' }}</p>
                        <p class="text-xs text-gray-500">{{ $booking->venue->sport_type ?? '' }}</p>
                    </td>
                    <td class="px-6 py-4 text-gray-700">{{ $booking->booking_date }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $booking->start_time }} – {{ $booking->end_time }}</td>
                    <td class="px-6 py-4">
                        @if($booking->payment)
                            <span class="inline-flex rounded-full bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-700">Paid</span>
                        @else
                            <span class="inline-flex rounded-full bg-amber-100 px-2 py-1 text-xs font-medium text-amber-700">Unpaid</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        {{ $booking->payment ? 'RM ' . number_format($booking->payment->amount, 2) : '—' }}
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="{{ route('admin.bookings.destroy', $booking->id) }}" onsubmit="return confirm('Delete this booking?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs px-3 py-1 rounded-lg border border-red-300 text-red-600 hover:bg-red-50 transition">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="px-6 py-6 text-center text-gray-500">No bookings found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $bookings->links() }}
    </div>
</div>
@endsection
