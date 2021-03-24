<x-guest-layout>
    <x-jet-authentication-card>


        <x-slot name="logo">

                <!-- Logo -->
                    <a href="{{ route('dashboard') }}" >
						<img src="https://www.freepnglogos.com/uploads/logo-home-png/chimney-home-icon-transparent-1.png" style="width:15%; margin:0 auto;  margin-top: 2%;">
                    </a>
        </x-slot>
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="surname" class="mt-2" value="{{ __('Apellidos') }}" />
                <x-jet-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
            </div>

            <div>
                <x-jet-label for="comercial" class="mt-2" value="{{ __('Comercial') }}" />
                <x-jet-input id="comercial" class="block mt-1 w-full" type="text" name="comercial" :value="old('comercial')" required autofocus autocomplete="comercial" />
            </div>

            <div>
                <x-jet-label for="estado" class="mt-2" value="{{ __('Estado') }}" />
                <select name="estado" id="estado" class="w-full block text-gray-400 outline-gray-400 focus:outline-blue-200" required>
                      <option class="w-full block text-gray-400 outline-gray-400 focus:outline-blue-200" value="Activo">Activo</option>
                      <option class="w-full block text-gray-400 outline-gray-400 focus:outline-blue-200" value="Inactivo">Inactivo</option>
                </select>
                {{--<x-jet-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado')" required autofocus autocomplete="estado" />--}}
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="dni" value="{{ __('DNI') }}" />
                <x-jet-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="telefono" value="{{ __('Teléfono') }}" />
                <x-jet-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de nacimiento') }}" />
                <x-jet-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Repetir Contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card >
</x-guest-layout>
        <div class="bg-gray-100"><br><br></div>
