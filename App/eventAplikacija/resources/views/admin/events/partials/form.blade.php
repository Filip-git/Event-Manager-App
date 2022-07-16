@csrf

            <!-- Name -->
            <div>
                <x-form-label for="name" :value="__('Naziv')" />

                @if(@isset($event))
                    <x-form-input id="name" class="bock mt-1 w-full" type="text" name="name" value="{{ $event->name }}" required autofocus />
                @else
                    <x-form-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                @endif
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-form-label for="description" :value="__('Opis')" />

                @if(@isset($event))
                    <x-form-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $event->description }}" required autofocus />
                @else
                    <x-form-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
                @endif
            </div>

            <!-- Date -->
            <div class="mt-4">
                <x-form-label for="date" :value="__('Datum')" />

                @if(@isset($event))
                    <x-form-input id="date" class="block mt-1 w-full" type="datetime-local" name="date" value="{{ $event->date }}" required autofocus />
                @else
                    <x-form-input id="date" class="block mt-1 w-full" type="datetime-local" name="date" :value="old('date')" required autofocus />
                @endif
            </div>

            <!-- Organizer -->
            <div class="mt-4">
                <x-form-label for="organizer_id" :value="__('Organizator')" />

                <select name="organizer_id" class="form-select" aria-label="Area" id="chooseOrganizer"
                          onchange="this.form.click()">
                              @foreach($organizers as $organizer)
                              @if($organizer->hasAnyRole('organizator'))
                                  <option value="{{ $organizer->id }}"  @isset($event) @if($organizer->id == $event->organizer_id) selected @endif @endisset>{{ $organizer->name }}</option>
                              @endif
                              @endforeach
                </select>
            </div>

            <!-- Location -->
            <div class="mt-4">
                <x-form-label for="location_id" :value="__('Lokacija')" />

                <select name="location_id" class="form-select" aria-label="Area" id="chooseLocation"
                          onchange="this.form.click()">
                              @foreach($locations as $location)
                                  <option value="{{ $location->id }}" @isset($event) @if($location->id == $event->location->id) selected @endif @endisset>{{ $location->name }}</option>
                              @endforeach
                </select>
            </div>

            <!-- Price -->
            <div class="mt-4">
                <x-form-label for="price" :value="__('Cijena')" />

                @if(@isset($event))
                    <x-form-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{ $event->price }}" required autofocus />
                @else
                    <x-form-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus />
                @endif
            </div>

            <!-- Categories -->
            <div class="mt-4">
                @foreach ($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" name="categories[]"
                    type="checkbox" value="{{ $category->id }}" id="{{ $category->name }}" @isset($event) @if(in_array($category->id, $event->categories->pluck('id')->toArray())) checked @endif @endisset>
                    <label class="form-check-label" for="{{ $category->name }}" >
                        {{ $category->name }}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="flex items-center justify-end mt-4">
                @if(@isset($create))
                    <x-form-button class="ml-4">
                        {{ __('Kreirajte novi događaj') }}
                    </x-form-button>
                @else
                    <x-form-button class="ml-4">
                        {{ __('Uredite podatke o događaju') }}
                    </x-form-button>
                @endif
            </div>
