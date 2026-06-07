<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-cover bg-center relative px-4"
        style="background-image: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)), url('{{ asset('images/IIUM_Stadium.jpg') }}');">

        <div
            class="w-full sm:max-w-md bg-white/90 backdrop-blur-sm shadow-xl rounded-xl p-8 border border-emerald-100 z-10">

            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/IIUM_emblem.png') }}" class="h-24 w-auto object-contain" alt="IIUM Logo">
            </div>

            <h2 class="text-center text-xl font-bold text-emerald-900 mb-6">
                Welcome to IIUM Sports Reservation System!
            </h2>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="matric_number" value="{{ __('Matric Number') }}" />
                    <x-input id="matric_number" class="block mt-1 w-full" type="text" name="matric_number"
                        :value="old('matric_number')" required autofocus autocomplete="username"
                        placeholder="e.g., 2329169" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <div class="block mt-4 flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-emerald-700"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <div class="mt-6 flex flex-col gap-2">
                    <x-button class="w-full justify-center bg-emerald-600 hover:bg-emerald-700 text-white py-2">
                        {{ __('Log in') }}
                    </x-button>

                    <a href="{{ route('register') }}" class="text-center text-sm text-emerald-600 hover:underline mt-2">
                        Don't have an account? Register here
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>