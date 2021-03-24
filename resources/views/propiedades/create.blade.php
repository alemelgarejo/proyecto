<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('propiedades.index') }}"  style="color: rgb(111, 111, 111);">Propiedades</a> /
            <a href="{{ route('propiedades.create') }}"  style="color: rgb(111, 111, 111);">Crear propiedad</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <br>

    <form method="POST" action="{{ route('propiedades.store') }}" class="mx-40" style="min-width: 40%;">
        @csrf
        @method('POST')

        {{-- Propietario --}}
        <div class="mb-4">
            <label for="propietario_id" class="form-label">Propietario</label>
            <select class="form-control" name="propietario_id" id="propietario_id">
                @foreach ($propietarios as $name => $id)
                    <option {{ $propiedad->propietario_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">
                        {{ $name }}</option>
                @endforeach
            </select>
            @error('propietario_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Estado --}}
        <div class="mb-4">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control" value="{{ old('estado', $propiedad->estado) }}">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
            @error('estado')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Valoraciรณn --}}
        <div class="mb-4">
            <label for="valoracion" class="form-label">Valor</label>
            <input name="valoracion" type="number" class="form-control" id="valoracion" aria-describedby="valoracion"
                value="{{ old('valoracion', $propiedad->valoracion) }}">
            @error('valoracion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Tipo --}}
        <div class="mb-4">
            <label for="tipo" class="form-label">Tipo</label>
            <input name="tipo" type="text" class="form-control" id="tipo" aria-describedby="tipo"
                value="{{ old('tipo', $propiedad->tipo) }}">
            @error('tipo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Direcciรณn --}}
        <div class="mb-4">
            <label for="direccion" class="form-label">Direcciรณn</label>
            <input name="direccion" type="text" class="form-control" id="direccion" aria-describedby="direccion"
                value="{{ old('direccion', $propiedad->direccion) }}">
            @error('direccion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Ciudad --}}
        <div class="mb-4">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input name="ciudad" type="text" class="form-control" id="ciudad" aria-describedby="ciudad"
                value="{{ old('ciudad', $propiedad->ciudad) }}">
            @error('ciudad')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Provincia --}}
        <div class="mb-4">
            <label for="provincia" class="form-label">Provincia</label>
            <input name="provincia" type="text" class="form-control" id="provincia" aria-describedby="provincia"
                value="{{ old('provincia', $propiedad->provincia) }}">
            @error('provincia')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Superficie --}}
        <div class="mb-4">
            <label for="superficie" class="form-label">Superficie</label>
            <input name="superficie" type="number" class="form-control" id="superficie" aria-describedby="superficie"
                value="{{ old('superficie', $propiedad->superficie) }}">
            @error('superficie')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Google map --}}
        <div class="mb-4">
            <label for="google_maps" class="form-label">Google maps URL</label>
            <input name="google_maps" type="text" class="form-control" id="google_maps" aria-describedby="google_maps"
                value="{{ old('google_maps', $propiedad->google_maps) }}">
            @error('google_maps')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success btn-sm" style="color: white;"><i class="fas fa-plus-circle"></i> Crear</button>
    </form>
    <br><br>
</x-app-layout>
