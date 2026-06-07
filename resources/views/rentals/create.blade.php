{{-- Replace the top --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">Equipment Rental</h2>
    </x-slot>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white/95 backdrop-blur-sm shadow-xl rounded-3xl p-6 border border-emerald-100">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-emerald-900">Equipment Rental</h1>
                    <p class="mt-2 text-gray-600">Choose rental gear for booking #{{ $booking->id }}
                        ({{ $booking->venue->sport_type }}).</p>
                    <p class="mt-1 text-sm text-gray-500">Your session is scheduled for {{ $booking->booking_date }}
                        from
                        {{ $booking->start_time }} to {{ $booking->end_time }}.
                    </p>
                </div>
                <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-4 text-sm text-emerald-700">
                    Base booking fee: <strong>RM2.00</strong>
                </div>
            </div>

            @if ($errors->any())
                <div class="mt-6 bg-amber-50 border-l-4 border-amber-500 text-amber-900 p-4 rounded text-sm shadow-sm">
                    <span class="font-bold block mb-1">Rental selection issue:</span>
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($equipment->isEmpty())
                <div class="mt-6 rounded-2xl border border-gray-200 bg-gray-50 p-6 text-center text-gray-600">
                    No rental equipment is available for {{ $booking->venue->sport_type }} at this time.
                </div>
            @else
                <form id="rental-form" action="{{ route('rental.store', $booking->id) }}" method="POST"
                    class="mt-6 space-y-6">
                    @csrf
                    <div class="grid gap-6 md:grid-cols-2">
                        @foreach ($equipment as $item)
                            <div class="rounded-3xl border border-gray-200 p-5 shadow-sm transition hover:shadow-md">


                                <div class="mt-4">
                                    <h2 class="text-xl font-semibold text-gray-900">{{ $item->name }}</h2>
                                    <p class="mt-2 text-sm text-gray-500">
                                        {{ $item->description ?? 'High-quality rental gear for your session.' }}
                                    </p>
                                    <div class="mt-4 flex flex-wrap items-center gap-3 text-sm text-gray-600">
                                        <span
                                            class="rounded-full bg-emerald-50 px-3 py-1 text-emerald-700">RM{{ number_format($item->price_per_unit, 2) }}
                                            per unit</span>
                                        <span class="rounded-full bg-slate-100 px-3 py-1">Available:
                                            {{ $item->quantity_available }}</span>
                                    </div>
                                </div>

                                <div class="mt-5 flex items-center justify-between gap-3">
                                    <label class="block text-sm font-medium text-gray-700"
                                        for="quantity-{{ $item->id }}">Quantity</label>
                                    <input id="quantity-{{ $item->id }}" type="number" name="quantities[{{ $item->id }}]"
                                        data-price="{{ $item->price_per_unit }}" value="{{ old('quantities.' . $item->id, 0) }}"
                                        min="0" max="{{ $item->quantity_available }}"
                                        class="w-24 rounded-xl border border-gray-300 px-3 py-2 text-sm outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100" />
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div id="rental-summary"
                        class="rounded-3xl border border-emerald-100 bg-emerald-50 p-5 text-sm text-emerald-900">
                        <p class="font-semibold">Rental total</p>
                        <div class="mt-2 text-gray-700 space-y-2">
                            <p id="equipment-total-text">Equipment total: RM0.00</p>
                            <p>Booking fee: <strong>RM2.00</strong></p>
                            <p class="text-lg font-bold text-emerald-900">Grand total: <span
                                    id="grand-total-text">RM2.00</span></p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50">
                            Back to venues
                        </a>
                        <div class="flex items-center gap-3">
                            <button type="submit"
                                class="inline-flex justify-center rounded-lg bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                                Proceed to Payment
                            </button>
                        </div>
                    </div>
                    <script>
                        (() => {
                            const baseFee = 2.0;
                            const equipmentTotalText = document.getElementById('equipment-total-text');
                            const grandTotalText = document.getElementById('grand-total-text');
                            const quantityInputs = document.querySelectorAll('input[name^="quantities["]');

                            const formatMoney = (value) => `RM${value.toFixed(2)}`;
                            const updateTotals = () => {
                                let equipmentTotal = 0;

                                quantityInputs.forEach((input) => {
                                    const quantity = Number(input.value) || 0;
                                    const price = Number(input.dataset.price) || 0;
                                    equipmentTotal += quantity * price;
                                });

                                const grandTotal = equipmentTotal + baseFee;
                                equipmentTotalText.textContent = `Equipment total: ${formatMoney(equipmentTotal)}`;
                                grandTotalText.textContent = formatMoney(grandTotal);
                            };

                            quantityInputs.forEach((input) => {
                                input.addEventListener('input', updateTotals);
                            });

                            // Skip rentals button: zero all quantities and submit the form
                            const skipBtn = document.getElementById('skip-rentals');
                            const rentalForm = document.getElementById('rental-form');
                            if (skipBtn) {
                                skipBtn.addEventListener('click', (e) => {
                                    e.preventDefault();
                                    quantityInputs.forEach((input) => { input.value = 0; });
                                    updateTotals();
                                    rentalForm.submit();
                                });
                            }

                            updateTotals();
                        })();
                    </script>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>