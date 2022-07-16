<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Ime')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Lozinka')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Potvrdite lozinku')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <!-- Organizer select -->
            <div class="mt-4 d-flex">
                <x-label :value="__('Želite li postati organizator?')" />

                <div style="display: flex; margin-bottom: 30px">
                <label class="customradio mt-2" style="width: 100%; padding-right: 15px;">
                    <input  value="organizer" id="organizer" type="radio" name="organizer">
                    <span class="radio"></span>
                </label>

                <label class="customradio-x mt-2" style="width: 100%; padding-left: 15px;">
                    <input value="not-organizer" id="not-organizer" type="radio" name="organizer" checked>
                    <span class="radio-x"></span>
                </label>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Već ste registrirani?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registracija') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
