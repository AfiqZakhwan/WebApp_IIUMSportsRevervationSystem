<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
            Payment Summary
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto bg-white/95 backdrop-blur-sm border border-emerald-100 shadow-xl rounded-xl p-6">

            <h2 class="text-2xl font-bold text-emerald-900 mb-1">Order Summary</h2>
            <p class="text-sm text-gray-500 mb-6">Booking #{{ $booking->id }} — {{ $booking->venue->name }}</p>

            {{-- Booking details --}}
            <div class="bg-gray-50 rounded-lg p-4 mb-4 text-sm text-gray-700 space-y-1">
                <div class="flex justify-between">
                    <span>Date</span>
                    <span class="font-medium">{{ $booking->booking_date }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Time</span>
                    <span class="font-medium">{{ $booking->start_time }} – {{ $booking->end_time }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Sport type</span>
                    <span class="font-medium">{{ $booking->venue->sport_type }}</span>
                </div>
            </div>

            {{-- Equipment rental breakdown --}}
            @if ($rentals->isNotEmpty())
                <div class="mb-4">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Equipment Rented</p>
                    <div class="space-y-2">
                        @foreach ($rentals as $rental)
                            <div class="flex justify-between text-sm text-gray-700">
                                <span>{{ $rental->equipment->name }} × {{ $rental->quantity }}</span>
                                <span>RM{{ number_format($rental->item_total, 2) }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Fee breakdown --}}
            <div class="border-t border-gray-200 pt-4 space-y-2 text-sm text-gray-700">
                <div class="flex justify-between">
                    <span>Equipment subtotal</span>
                    <span>RM{{ number_format($equipmentTotal, 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Base booking fee</span>
                    <span>RM{{ number_format($baseFee, 2) }}</span>
                </div>
                <div
                    class="flex justify-between font-bold text-emerald-900 text-base border-t border-gray-200 pt-2 mt-2">
                    <span>Total</span>
                    <span>RM{{ number_format($total, 2) }}</span>
                </div>
            </div>

            {{-- Payment method form --}}
            <form action="{{ route('payment.store', $booking->id) }}" method="POST" class="mt-6">
                @csrf

                <p class="text-sm font-semibold text-gray-700 mb-3">Select payment method</p>

                <div class="grid grid-cols-2 gap-3 mb-6">
                    @foreach (['online_banking' => 'Online Banking', 'credit_card' => 'Credit Card', 'debit_card' => 'Debit Card', 'ewallet' => 'E-Wallet'] as $value => $label)
                        <label
                            class="flex items-center gap-2 border border-gray-200 rounded-lg p-3 cursor-pointer hover:border-emerald-500 hover:bg-emerald-50 transition text-sm font-medium text-gray-700">
                            <input type="radio" name="payment_method" value="{{ $value }}" class="accent-emerald-600"
                                required>
                            {{ $label }}
                        </label>
                    @endforeach
                </div>

                @error('payment_method')
                    <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
                @enderror

                <button type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-lg transition shadow-md">
                    Pay RM{{ number_format($total, 2) }}
                </button>
            </form>

        </div>
    </div>
</x-app-layout>