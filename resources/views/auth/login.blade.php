<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-input id="email" class="block mt-1 w-full" placeholder="E-mail" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         placeholder="Пароль"
                         required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-center mt-4">

                <x-button class="w-full">
                    {{ __('Войти') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
