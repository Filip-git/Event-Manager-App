@csrf

            <!-- Name -->
            <div>
                <x-form-label for="name" :value="__('Naziv')" />

                @if(@isset($category))
                    <x-form-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $category->name }}" required autofocus />
                @else
                    <x-form-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                @endif
            </div>

            <div class="mt-4">
                <x-form-label for="description" :value="__('Description')" />

                @if(@isset($category))
                    <x-form-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $category->description }}" required autofocus />
                @else
                    <x-form-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
                @endif
            </div>

            <div class="mt-4">
                <x-form-label for="icon" :value="__('Ikona')" />

                @if(@isset($category))
                    <input id="icon" class="block mt-1 w-full" type="file" name="icon" value="{{ $category->icon }}" required autofocus />
                @else
                    <input id="icon" class="block mt-1 w-full" type="file" name="icon" :value="old('icon')" required autofocus />
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                @if(@isset($create))
                    <x-form-button class="ml-4">
                        {{ __('Kreirajte novu kategoriju') }}
                    </x-form-button>
                @else
                    <x-form-button class="ml-4">
                        {{ __('Uredite podatke o kategoriji') }}
                    </x-form-button>
                @endif
            </div>
