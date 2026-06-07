<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
            {{ __('Configure Reservation Slot') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto bg-white/95 backdrop-blur-sm border border-emerald-100 shadow-xl rounded-xl p-6">
            <h2 class="text-2xl font-bold text-emerald-900 mb-2">Book: {{ $venue->name }}</h2>
            <p class="text-xs text-gray-500 mb-4 font-semibold uppercase tracking-wider">Type: {{ $venue->sport_type }}
            </p>

            <!-- Error Banner -->
            @if($errors->any())
                <div class="bg-amber-50 border-l-4 border-amber-500 text-amber-900 p-4 mb-4 rounded text-sm shadow-sm">
                    <span class="font-bold block mb-1">Booking Rejected:</span>
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <input type="hidden" name="venue_id" value="{{ $venue->id }}">

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">Date:</label>
                    <input type="date" name="booking_date" value="{{ old('booking_date') }}"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                        required>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1 text-sm">Start Time:</label>
                        <div class="flex items-center gap-2">
                            <button type="button" data-target="start_time" data-direction="-1"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-100 transition">
                                −
                            </button>
                            <input id="start_time" type="time" name="start_time" value="{{ old('start_time') }}"
                                class="flex-1 border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                                required>
                            <button type="button" data-target="start_time" data-direction="1"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-100 transition">
                                +
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1 text-sm">End Time:</label>
                        <div class="flex items-center gap-2">
                            <button type="button" data-target="end_time" data-direction="-1"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-100 transition">
                                −
                            </button>
                            <input id="end_time" type="time" name="end_time" value="{{ old('end_time') }}"
                                class="flex-1 border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                                required>
                            <button type="button" data-target="end_time" data-direction="1"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-100 transition">
                                +
                            </button>
                        </div>
                    </div>
                </div>

                <div class="text-xs text-emerald-800 mb-6 bg-emerald-50/80 p-3 rounded-lg border border-emerald-100">
                    <strong>Notice:</strong> The system automatically blocks slots intersecting prayer windows (7:00 PM
                    - 9:00 PM) and limits maximum single sessions to 2 hours.
                </div>

                <button type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 rounded-lg transition shadow-md">
                    Confirm Venue & Select Equipment
                </button>
            </form>
        </div>
    </div>

    <script>
        (() => {
            const step = 15; // minutes per click
            const buttons = document.querySelectorAll('button[data-target][data-direction]');

            const pad = (value) => String(value).padStart(2, '0');

            const adjustTime = (input, deltaMinutes) => {
                if (!input.value) {
                    input.value = '08:00';
                }

                const [hours, minutes] = input.value.split(':').map(Number);
                const date = new Date();
                date.setHours(hours);
                date.setMinutes(minutes + deltaMinutes);

                input.value = `${pad(date.getHours())}:${pad(date.getMinutes())}`;
            };

            buttons.forEach((button) => {
                button.addEventListener('click', () => {
                    const target = button.dataset.target;
                    const direction = Number(button.dataset.direction);
                    const input = document.querySelector(`input[name="${target}"]`);
                    if (!input) return;
                    adjustTime(input, direction * step);
                });
            });
        })();
    </script>
</x-app-layout>