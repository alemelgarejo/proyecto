<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('mispropietarios.index') }}"  style="color: rgb(111, 111, 111);">Mis propietarios</a> /
            <a href="{{ route('mispropietarios.create') }}"  style="color: rgb(111, 111, 111);">Crear propietario</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <br>

    <form method="POST" action="{{ route('mispropietarios.store') }}" class="mx-40" style="min-width: 40%;">
        @csrf
        @method('POST')
        {{-- Nombre --}}
        <div class="mb-4">
            <label for="name" class="form-label">Nombre</label>
            <input name="name" type="text" placeholder="Nombre"  class="form-control" id="name" aria-describedby="name"
                value="{{ old('name', $mispropietario->name) }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Apellidos --}}
        <div class="mb-4">
            <label for="surname" class="form-label">Apellidos</label>
            <input name="surname" type="text" placeholder="Apellidos"  class="form-control" id="surname" aria-describedby="surname"
                value="{{ old('surname', $mispropietario->surname) }}">
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
                    <option {{ $mispropietario->user_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">
                        {{ $name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" placeholder="Email"  class="form-control" id="email" aria-describedby="email"
                value="{{ old('email', $mispropietario->email) }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Teléfono --}}
        <div class="mb-4">
            <label for="telefono" class="form-label">Teléfono</label>
            <input name="telefono" type="text" placeholder="Teléfono"  class="form-control" id="telefono" aria-describedby="telefono"
                value="{{ old('telefono', $mispropietario->telefono) }}">
            @error('telefono')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- DNI --}}
        <div class="mb-4">
            <label for="dni" class="form-label">DNI</label>
            <input name="dni" type="text" class="form-control" placeholder="DNI"  id="dni" aria-describedby="dni"
                value="{{ old('dni', $mispropietario->dni) }}">
            @error('dni')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Estado --}}
        <div class="mb-4">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control"  placeholder="Estado"  value="{{ old('estado', $mispropietario->estado) }}">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
            @error('estado')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Fecha de nacimiento --}}
        <div class="mb-4">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
            <input name="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento"  class="form-control" id="fecha_nacimiento"
                aria-describedby="fecha_nacimiento" value="{{ old('fecha_nacimiento', $mispropietario->fecha_nacimiento) }}">
            @error('fecha_nacimiento')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Direccion --}}
        <div class="mb-4">
            <label for="direccion" class="form-label">Dirección</label>
            <input name="direccion" type="text" class="form-control" placeholder="Dirección"  id="direccion" aria-describedby="direccion"
                value="{{ old('direccion', $mispropietario->direccion) }}">
            @error('direccion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Ciudad --}}
        <div class="mb-4">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input name="ciudad" type="text" class="form-control" placeholder="Ciudad"   id="ciudad" aria-describedby="ciudad"
                value="{{ old('ciudad', $mispropietario->ciudad) }}">
            @error('ciudad')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Provincia --}}
        <div class="mb-4">
            <label for="provincia" class="form-label">Provincia</label>
            <input name="provincia" type="text" class="form-control" placeholder="Provincia"  id="provincia" aria-describedby="provincia"
                value="{{ old('provincia', $mispropietario->provincia) }}">
            @error('provincia')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Observaciones --}}
        <div class="mb-4">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea name="observaciones" type="text" class="form-control" placeholder="Observaciones"  id="observaciones"
                aria-describedby="observaciones"
                value="{{ old('observaciones', $mispropietario->observaciones) }}">{{ old('observaciones', $mispropietario->observaciones) }}</textarea>
            @error('observaciones')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success btn-sm" style="color: white;"><i class="fas fa-plus-circle"></i> Crear</button>
    </form>
    <br><br>
</x-app-layout>
