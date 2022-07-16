@csrf

            <!-- Name -->
            <div>
                <x-form-label for="name" :value="__('Naziv')" />

                @if(@isset($location))
                    <x-form-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $location->name }}" required autofocus />
                @else
                    <x-form-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                @if(@isset($create))
                    <x-form-button class="ml-4">
                        {{ __('Kreirajte novu lokaciju') }}
                    </x-form-button>
                @else
                    <x-form-button class="ml-4">
                        {{ __('Uredite podatke o lokaciji') }}
                    </x-form-button>
                @endif
            </div>
