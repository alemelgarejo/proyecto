<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('users.index') }}"  style="color: rgb(111, 111, 111);">Usuarios</a> /
            <a href="{{ route('users.edit', $user->id) }}"  style="color: rgb(111, 111, 111);">Editar usuario: {{ $user->name }} {{ $user->surname }}</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <br>

    <form method="POST" action="{{ route('users.update',  $user->id) }}" class="mx-40" style="min-width: 40%;">
        @csrf
        @method('PUT')
        {{-- Nombre --}}
        <div class="mb-4">
            <label for="name" class="form-label">Nombre</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="name"
                value="{{ old('name', $user->name) }}">
            <div id="nameHelp" class="form-text">No compartiremos su información personal con terceros.</div>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Apellidos --}}
        <div class="mb-4">
            <label for="surname" class="form-label">Apellidos</label>
            <input name="surname" type="text" class="form-control" id="surname" aria-describedby="surname"
                value="{{ old('surname', $user->surname) }}">
            @error('surname')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="email"
                value="{{ old('email', $user->email) }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Teléfono --}}
        <div class="mb-4">
            <label for="telefono" class="form-label">Teléfono</label>
            <input name="telefono" type="text" class="form-control" id="telefono" aria-describedby="telefono"
                value="{{ old('telefono', $user->telefono) }}">
            @error('telefono')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Comercial --}}
        <div class="mb-4">
            <label for="comercial" class="form-label">Comercial</label>
            <input name="comercial" type="text" class="form-control" id="comercial" aria-describedby="comercial"
                value="{{ old('comercial', $user->comercial) }}">
            @error('comercial')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- DNI --}}
        <div class="mb-4">
            <label for="dni" class="form-label">DNI</label>
            <input name="dni" type="text" class="form-control" id="dni" aria-describedby="dni"
                value="{{ old('dni', $user->dni) }}">
            @error('dni')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Fecha de nacimiento --}}
        <div class="mb-4">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
            <input name="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento"
                aria-describedby="fecha_nacimiento" value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}">
            @error('fecha_nacimiento')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Rol --}}
        <div class="mb-4">
            <label for="role_id" class="form-label">Rol</label>
            <select name="role_id" id="role_id" class="form-control">
                <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Regular</option>
            </select>
            @error('role_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Estado --}}
        <div class="mb-4">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control" value="{{ old('estado', $user->estado) }}">
                <option value="Activo" {{ $user->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ $user->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('estado')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-secondary" style="color: white;">Actualizar</button>
    </form>
    <br><br>
</x-app-layout>