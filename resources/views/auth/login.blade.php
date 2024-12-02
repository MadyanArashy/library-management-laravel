<x-app-layout>
    <section class="min-h-screen flex flex-col-reverse lg:flex-row gap-12 sm:justify-center sm:items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-screen-sm px-12">
            <img src="{{ asset('images/3-siswa.png') }}" class="max-w-full block" alt="">
        </div>
        <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-primary-500 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <!-- Header -->
            <h1 class="text-3xl font-bold text-white">Selamat Datang di Perpustakaan SMK Pesat IT XPro</h1>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="flex items-center justify-end mt-4 gap-3">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-300 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Lupa kata sandi Anda?') }}
                        </a>
                    @endif
                    <x-primary-button>
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
