<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-cover bg-center relative py-12 px-4"
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

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Full Name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                        autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="matric_number" value="{{ __('Matric Number') }}" />
                    <x-input id="matric_number" class="block mt-1 w-full" type="text" name="matric_number"
                        :value="old('matric_number')" required />
                </div>

                <div class="mt-4">
                    <x-label for="phone" value="{{ __('Phone Number') }}" />
                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                        required />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email Address') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="mt-6 flex flex-col gap-2">
                    <x-button class="w-full justify-center bg-emerald-600 hover:bg-emerald-700 text-white py-2">
                        {{ __('Register Account') }}
                    </x-button>

                    <a class="underline text-sm text-gray-600 hover:text-emerald-700 text-center mt-2"
                        href="{{ route('login') }}">
                        {{ __('Already registered? Login here') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>