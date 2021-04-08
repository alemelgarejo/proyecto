<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('propietarios.index') }}"  style="color: rgb(111, 111, 111);">Propietarios</a> /
            <a href="{{ route('propietarios.create') }}"  style="color: rgb(111, 111, 111);">Crear propietarios</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <br>

    <form method="POST" action="{{ route('propietarios.store') }}" class="mx-40" style="min-width: 40%;">
        @csrf
        @method('POST')
        {{-- Nombre --}}
        <div class="mb-4">
            <label for="name" class="form-label">Nombre</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="Nombre"
                value="{{ old('name', $propietario->name) }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Apellidos --}}
        <div class="mb-4">
            <label for="surname" class="form-label">Apellidos</label>
            <input name="surname" type="text" class="form-control" id="surname" aria-describedby="surname" placeholder="Apellidos"
                value="{{ old('surname', $propietario->surname) }}">
            @error('surname')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Encargado --}}
        <div class="mb-4">
            {{-- <label for="user_id" class="form-label">Encargado</label>
            <input name="user_id" type="text" class="form-control" id="user_id" aria-describedby="user_id"
                value="{{ old('user_id', $propietario->user_id) }}"> --}}
                <label for="user_id" class="form-label">Encargado</label>
            <select class="form-control" name="user_id" id="user_id">
                @foreach ($users as $name => $id)
                    <option {{ $propietario->user_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">
                        {{ $name }}</option>
                @endforeach
            </select>
            @error('surname')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email"
                value="{{ old('email', $propietario->email) }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Teléfono --}}
        <div class="mb-4">
            <label for="telefono" class="form-label">Teléfono</label>
            <input name="telefono" type="text" class="form-control" id="telefono" aria-describedby="telefono" placeholder="Teléfono"
                value="{{ old('telefono', $propietario->telefono) }}">
            @error('telefono')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- DNI --}}
        <div class="mb-4">
            <label for="dni" class="form-label">DNI</label>
            <input name="dni" type="text" class="form-control" id="dni" aria-describedby="dni" placeholder="DNI"
                value="{{ old('dni', $propietario->dni) }}">
            @error('dni')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Estado --}}
        <div class="mb-4">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control" value="{{ old('estado', $propietario->estado) }}">
                <option value="Activo" {{ $propietario->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ $propietario->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('estado')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Fecha de nacimiento --}}
        <div class="mb-4">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
            <input name="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento"
                aria-describedby="fecha_nacimiento" value="{{ old('fecha_nacimiento', $propietario->fecha_nacimiento) }}">
            @error('fecha_nacimiento')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Direccion --}}
        <div class="mb-4">
            <label for="direccion" class="form-label">Dirección</label>
            <input name="direccion" type="text" class="form-control" id="direccion" aria-describedby="direccion" placeholder="Dirección"
                value="{{ old('direccion', $propietario->direccion) }}">
            @error('direccion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Ciudad --}}
        <div class="mb-4">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input name="ciudad" type="text" class="form-control" id="ciudad" aria-describedby="ciudad" placeholder="Ciudad"
                value="{{ old('ciudad', $propietario->ciudad) }}">
            @error('ciudad')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Provincia --}}
        <div class="mb-4">
            <label for="provincia" class="form-label">Provincia</label>
            <input name="provincia" type="text" class="form-control" id="provincia" aria-describedby="provincia" placeholder="Provincia"
                value="{{ old('provincia', $propietario->provincia) }}">
            @error('provincia')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Observaciones --}}
        <div class="mb-4">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea name="observaciones" type="text" class="form-control" id="observaciones"
                aria-describedby="observaciones"
                value="{{ old('observaciones', $propietario->observaciones) }}">{{ old('observaciones', $propietario->observaciones) }}</textarea>
            @error('observaciones')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="" style="color:black;"><img src="{{asset('images/sav.png')}}"  alt="deletelogo"  style="float: left;" >&nbsp;&nbsp;</button>
    </form>
    <br><br>
</x-app-layout>
