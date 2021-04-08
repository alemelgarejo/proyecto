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
            <select class="form-control" placeholder="Propietario"  name="propietario_id" id="propietario_id">
                @foreach ($propietarios as $name => $id)
                    <option {{ $propiedade->propietario_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">
                        {{ $name }}</option>
                @endforeach
            </select>
            @error('propietario_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Estado --}}
        <div class="mb-4">
            <label for="estado" placeholder="Estado"  class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control" value="{{ old('estado', $propiedade->estado) }}">
                <option value="Activo" {{ $propiedade->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ $propiedade->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('estado')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Valoracion --}}
        <div class="mb-4">
            <label for="valoracion" class="form-label">Valor</label>
            <input name="valoracion" type="number" placeholder="Valor"  class="form-control" id="valoracion" aria-describedby="valoracion"
                value="{{ old('valoracion', $propiedade->valoracion) }}">
            @error('valoracion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Tipo de propiedad --}}
        <div class="mb-4">
            <label for="tipo" class="form-label">Tipo de propiedad</label>
            <select name="tipo" placeholder="Tipo de propiedad" id="tipo" class="form-control" value="{{ old('tipo', $propiedade->tipo) }}">
                <option value="1" {{ $propiedade->tipo == '1' ? 'selected' : '' }}>Tipo de propiedad</option>
                <option value="Casa terrera" {{ $propiedade->tipo == 'Casa terrera' ? 'selected' : '' }}>Casa terrera</option>
                <option value="Piso" {{ $propiedade->tipo == 'Piso' ? 'selected' : '' }}>Piso</option>
                <option value="Estudio" {{ $propiedade->tipo == 'Estudio' ? 'selected' : '' }}>Estudio</option>
                <option value="Local" {{ $propiedade->tipo == 'Local' ? 'selected' : '' }}>Local</option>
                <option value="Nave" {{ $propiedade->tipo == 'Nave' ? 'selected' : '' }}>Nave</option>
                <option value="Negocio" {{ $propiedade->tipo == 'Negocio' ? 'selected' : '' }}>Negocio</option>
            </select>
            @error('tipo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

		{{-- Tipo de interes --}}
        <div class="mb-4">
            <label for="tipo_interes" class="form-label">¿Qué desea hacer con su propiedad?</label>
            <select name="tipo_interes" placeholder="¿Qué desea hacer con su propiedad?" id="tipo" class="form-control" value="{{ old('tipo_interes', $propiedade->tipo_interes) }}">
                <option value="1" {{ $propiedade->tipo_interes == '1' ? 'selected' : '' }}>¿Qué desea hacer con su propiedad?</option>
                <option value="Venta" {{ $propiedade->tipo_interes == 'Venta' ? 'selected' : '' }}>Venta</option>
                <option value="Alquiler" {{ $propiedade->tipo_interes == 'Alquiler' ? 'selected' : '' }}>Alquiler</option>
                <option value="Traspaso" {{ $propiedade->tipo_interes == 'Traspaso' ? 'selected' : '' }}>Traspaso</option>
            </select>
            @error('tipo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Direcciรณn --}}
        <div class="mb-4">
            <label for="direccion" class="form-label">Direccion</label>
            <input name="direccion" type="text" placeholder="Dirección"   class="form-control" id="direccion" aria-describedby="direccion"
                value="{{ old('direccion', $propiedade->direccion) }}">
            @error('direccion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Ciudad --}}
        <div class="mb-4">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input name="ciudad" type="text" placeholder="Ciudad"   class="form-control" id="ciudad" aria-describedby="ciudad"
                value="{{ old('ciudad', $propiedade->ciudad) }}">
            @error('ciudad')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Provincia --}}
        <div class="mb-4">
            <label for="provincia" class="form-label">Provincia</label>
            <input name="provincia" type="text" placeholder="Provincia"   class="form-control" id="provincia" aria-describedby="provincia"
                value="{{ old('provincia', $propiedade->provincia) }}">
            @error('provincia')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Superficie --}}
        <div class="mb-4">
            <label for="superficie" class="form-label">Superficie</label>
            <input name="superficie" type="number" placeholder="Superficie"  class="form-control" id="superficie" aria-describedby="superficie"
                value="{{ old('superficie', $propiedade->superficie) }}">
            @error('superficie')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Google map --}}
        <div class="mb-4">
            <label for="google_maps" class="form-label">Google maps URL</label>
            <input name="google_maps" type="text" placeholder="URL Google maps"   class="form-control" id="google_maps" aria-describedby="google_maps"
                value="{{ old('google_maps', $propiedade->google_maps) }}">
            @error('google_maps')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="" style="color:black;"><img src="{{asset('images/sav.png')}}"  alt="deletelogo"  style="float: left;" >&nbsp;&nbsp;</button>
    </form>
    <br><br>
</x-app-layout>
