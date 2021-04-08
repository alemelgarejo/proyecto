<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('mispropiedades.index') }}"  style="color: rgb(111, 111, 111);">Mis propiedades</a> /
            <a href="{{ route('mispropiedades.create') }}"  style="color: rgb(111, 111, 111);">Crear propiedad</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <br>

    <form method="POST" action="{{ route('mispropiedades.store') }}" class="mx-40" style="min-width: 40%;">
        @csrf
        @method('POST')

        {{-- Propietario --}}
        <div class="mb-4">
            <label for="propietario_id" class="form-label">Propietario</label>
            <select class="form-control" placeholder="Propietario"  name="propietario_id" id="propietario_id">
                @foreach ($propietarios as $name => $id)
                    <option {{ $mispropiedade->propietario_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">
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
            <select name="estado" id="estado" class="form-control" value="{{ old('estado', $mispropiedade->estado) }}">
                <option value="Activo" {{ $mispropiedade->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ $mispropiedade->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('estado')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Valoracion --}}
        <div class="mb-4">
            <label for="valoracion" class="form-label">Valor</label>
            <input name="valoracion" type="number" placeholder="Valor"  class="form-control" id="valoracion" aria-describedby="valoracion"
                value="{{ old('valoracion', $mispropiedade->valoracion) }}">
            @error('valoracion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Tipo de propiedad --}}
        <div class="mb-4">
            <label for="tipo" class="form-label">Tipo de propiedad</label>
            <select name="tipo" placeholder="Tipo de propiedad" id="tipo" class="form-control" value="{{ old('tipo', $mispropiedade->tipo) }}">
                <option value="1" {{ $mispropiedade->tipo == '1' ? 'selected' : '' }}>Tipo de propiedad</option>
                <option value="Casa terrera" {{ $mispropiedade->tipo == 'Casa terrera' ? 'selected' : '' }}>Casa terrera</option>
                <option value="Piso" {{ $mispropiedade->tipo == 'Piso' ? 'selected' : '' }}>Piso</option>
                <option value="Estudio" {{ $mispropiedade->tipo == 'Estudio' ? 'selected' : '' }}>Estudio</option>
                <option value="Local" {{ $mispropiedade->tipo == 'Local' ? 'selected' : '' }}>Local</option>
                <option value="Nave" {{ $mispropiedade->tipo == 'Nave' ? 'selected' : '' }}>Nave</option>
                <option value="Negocio" {{ $mispropiedade->tipo == 'Negocio' ? 'selected' : '' }}>Negocio</option>
            </select>
            @error('tipo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

		{{-- Tipo de interes --}}
        <div class="mb-4">
            <label for="tipo_interes" class="form-label">¿Qué desea hacer con su propiedad?</label>
            <select name="tipo_interes" placeholder="¿Qué desea hacer con su propiedad?" id="tipo" class="form-control" value="{{ old('tipo_interes', $mispropiedade->tipo_interes) }}">
                <option value="1" {{ $mispropiedade->tipo_interes == '1' ? 'selected' : '' }}>¿Qué desea hacer con su propiedad?</option>
                <option value="Venta" {{ $mispropiedade->tipo_interes == 'Venta' ? 'selected' : '' }}>Venta</option>
                <option value="Alquiler" {{ $mispropiedade->tipo_interes == 'Alquiler' ? 'selected' : '' }}>Alquiler</option>
                <option value="Traspaso" {{ $mispropiedade->tipo_interes == 'Traspaso' ? 'selected' : '' }}>Traspaso</option>
            </select>
            @error('tipo_interes')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Direcciรณn --}}
        <div class="mb-4">
            <label for="direccion" class="form-label">Direccion</label>
            <input name="direccion" type="text" placeholder="Dirección"   class="form-control" id="direccion" aria-describedby="direccion"
                value="{{ old('direccion', $mispropiedade->direccion) }}">
            @error('direccion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Ciudad --}}
        <div class="mb-4">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input name="ciudad" type="text" placeholder="Ciudad"   class="form-control" id="ciudad" aria-describedby="ciudad"
                value="{{ old('ciudad', $mispropiedade->ciudad) }}">
            @error('ciudad')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Provincia --}}
        <div class="mb-4">
            <label for="provincia" class="form-label">Provincia</label>
            <input name="provincia" type="text" placeholder="Provincia"   class="form-control" id="provincia" aria-describedby="provincia"
                value="{{ old('provincia', $mispropiedade->provincia) }}">
            @error('provincia')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Superficie --}}
        <div class="mb-4">
            <label for="superficie" class="form-label">Superficie</label>
            <input name="superficie" type="number" placeholder="Superficie"  class="form-control" id="superficie" aria-describedby="superficie"
                value="{{ old('superficie', $mispropiedade->superficie) }}">
            @error('superficie')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Google map --}}
        <div class="mb-4">
            <label for="google_maps" class="form-label">Google maps URL</label>
            <input name="google_maps" type="text" placeholder="URL Google maps"   class="form-control" id="google_maps" aria-describedby="google_maps"
                value="{{ old('google_maps', $mispropiedade->google_maps) }}">
            @error('google_maps')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="" style="color:black;"><img src="{{asset('images/sav.png')}}"  alt="deletelogo"  style="float: left;" >&nbsp;&nbsp;</button>
    </form>
    <br><br>
</x-app-layout>
