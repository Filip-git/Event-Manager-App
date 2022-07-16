@csrf

            <!-- Name -->
            <div>
                <x-form-label for="name" :value="__('Naziv')" />

                @if(@isset($role))
                    <x-form-input id="role_name" class="block mt-1 w-full" type="text" name="role_name" value="{{ $role->role_name }}" required autofocus />
                @else
                    <x-form-input id="role_name" class="block mt-1 w-full" type="text" name="role_name" :value="old('role_name')" required autofocus />
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                @if(@isset($create))
                    <x-form-button class="ml-4">
                        {{ __('Kreirajte novu ulogu') }}
                    </x-form-button>
                @else
                    <x-form-button class="ml-4">
                        {{ __('Uredite podatke o ulozi') }}
                    </x-form-button>
                @endif
            </div>
