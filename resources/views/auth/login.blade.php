<head>
    @vite(['resources/js/login_register.js'])
</head>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Voeg de container toe -->
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="input-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="input-error" />
            </div>

            <!-- Password -->
            <div class="input-group mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="input-error" />
            </div>

            <!-- Remember Me -->
            <div class="remember-me mt-4">
                <label class="inline-flex items-center cursor-pointer text-sm text-gray-700">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 focus:ring-2">
                    <span class="ml-2">Onthoud mij</span>
                </label>
            </div>


            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="forgot-password" href="{{ route('password.request') }}">
                        {{ __('Wachtwoord vergeten?') }}
                    </a>
                @endif

                <x-primary-button class="primary-button ms-3">
                    {{ __('Inloggen') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
