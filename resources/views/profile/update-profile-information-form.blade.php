<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4" >
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Surname -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="surname" value="{{ __('Surname') }}" />
            <x-jet-input id="surname" type="text" class="mt-1 block w-full" wire:model.defer="state.surname"
                autocomplete="surname" />
            <x-jet-input-error for="surname" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- DNI -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="dni" value="{{ __('DNI') }}" />
            <x-jet-input readonly id="dni" type="text" class="mt-1 block w-full" wire:model.defer="state.dni" />
            <x-jet-input-error for="dni" class="mt-2" />
        </div>

        <!-- Teléfono -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="telefono" value="{{ __('Telefono') }}" />
            <x-jet-input id="telefono" type="text" class="mt-1 block w-full" wire:model.defer="state.telefono" />
            <x-jet-input-error for="telefono" class="mt-2" />
        </div>

        <!-- Comercial -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="comercial" value="{{ __('Comercial') }}" />
            <x-jet-input id="comercial" type="text" class="mt-1 block w-full" wire:model.defer="state.comercial" />
            <x-jet-input-error for="comercial" class="mt-2" />
        </div>

        <!-- Estado -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="estado" value="{{ __('Estado') }}" />
            <x-jet-input readonly id="estado" type="text" class="mt-1 block w-full" wire:model.defer="state.estado" />
            <x-jet-input-error for="estado" class="mt-2" />
        </div>

        <!-- Fecha de nacimiento -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de nacimiento') }}" />
            <x-jet-input readonly id="fecha_nacimiento" type="date" class="mt-1 block w-full"
                wire:model.defer="state.fecha_nacimiento" />
            <x-jet-input-error for="fecha_nacimiento" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
