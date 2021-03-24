<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('ordenes.index') }}" style="color: rgb(111, 111, 111);">Órdenes</a> /
            <a href="{{ route('ordenes.edit', $ordene->id) }}" style="color: rgb(111, 111, 111);">Editar
                órden</a>
        </h2>
    </x-slot>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <br>

    <form method="POST" action="{{ route('ordenes.update', $ordene->id) }}" class="mx-40" style="min-width: 40%;">
        @csrf
        @method('PUT')

       {{-- Cliente --}}
       <div class="mb-4">
        <label for="cliente_id" class="form-label">Cliente</label>
        <select readonly class="form-control" name="cliente_id" id="cliente_id">
                <option value="{{ $ordene->cliente_id }}">
                    {{ $ordene->cliente->surname. ', ' .$ordene->cliente->name }}</option>
        </select>
        @error('cliente_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Fecha --}}
    <div class="mb-4">
        <label for="fecha" class="form-label">Fecha</label>
        <input readonly name="fecha" type="date" placeholder="Fecha" class="form-control" id="fecha" aria-describedby="fecha"
            value="{{ old('fecha', $ordene->fecha) }}">
        @error('fecha')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Ciudad --}}
    <div class="mb-4">
        <label for="ciudad" class="form-label">Ciudad</label>
        <input name="ciudad" type="text" placeholder="Ciudad" class="form-control" id="ciudad" aria-describedby="ciudad"
            value="{{ old('ciudad', $ordene->ciudad) }}">
        @error('ciudad')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Tipo de órden--}}
    <div class="mb-4">
        <label for="tipo_orden" class="form-label">Tipo de órden</label>
        <select name="tipo_orden" placeholder="Tipo de órden" id="tipo_orden" class="form-control" value="{{ old('tipo_orden', $ordene->tipo_orden) }}">
            <option value="1">Tipo de órden</option>
            <option value="Traspaso">Traspaso</option>
            <option value="Compra">Compra</option>
            <option value="Alquiler">Alquiler</option>
        </select>
        @error('tipo_orden')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Tipo de propiedad --}}
    <div class="mb-4">
        <label for="tipo_propiedad" class="form-label">Tipo de propiedad</label>
        <select name="tipo_propiedad" placeholder="Tipo de propiedad" id="tipo_propiedad" class="form-control" value="{{ old('tipo_propiedad', $ordene->tipo_propiedad) }}">
            <option value="1">Tipo de propiedad</option>
            <option value="Casa terrera">Casa terrera</option>
            <option value="Piso">Piso</option>
            <option value="Estudio">Estudio</option>
            <option value="Local">Local</option>
            <option value="Nave">Nave</option>
            <option value="Negocio">Negocio</option>
        </select>
        @error('tipo_propiedad')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Precio mínimo --}}
    <div class="mb-4">
        <label for="precio_minimo" class="form-label">Precio mínimo</label>
        <input name="precio_minimo" type="number" placeholder="Precio mínimo" class="form-control" id="precio_minimo" aria-describedby="precio_minimo"
            value="{{ old('precio_minimo', $ordene->precio_minimo) }}">
        @error('precio_minimo')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Precio máximo --}}
    <div class="mb-4">
        <label for="precio_maximo" class="form-label">Precio máximo</label>
        <input name="precio_maximo" type="number" placeholder="Precio máximo" class="form-control" id="precio_maximo" aria-describedby="precio_maximo"
            value="{{ old('precio_maximo', $ordene->precio_maximo) }}">
        @error('precio_maximo')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Superficie mínima --}}
    <div class="mb-4">
        <label for="superficie_minima" class="form-label">Superficie mínima</label>
        <input name="superficie_minima" type="number" class="form-control" placeholder="Superficie mínima" id="superficie_minima" aria-describedby="superficie_minima"
            value="{{ old('superficie_minima', $ordene->superficie_minima) }}">
        @error('superficie_minima')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Superficie máxima --}}
    <div class="mb-4">
        <label for="superficie_maxima" class="form-label">Superficie máxima</label>
        <input name="superficie_maxima" type="number" placeholder="Superficie máxima" class="form-control" id="superficie_maxima" aria-describedby="superficie_maxima"
            value="{{ old('superficie_maxima', $ordene->superficie_maxima) }}">
        @error('superficie_maxima')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Dormitorios mínimo --}}
    <div class="mb-4">
        <label for="dormitorios_minimo" class="form-label">Dormitorios mínimo</label>
        <input name="dormitorios_minimo" type="number" class="form-control" placeholder="Dormitorios mínimo" id="dormitorios_minimo" aria-describedby="dormitorios_minimo"
            value="{{ old('dormitorios_minimo', $ordene->dormitorios_minimo) }}">
        @error('dormitorios_minimo')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Dormitorios máximo --}}
    <div class="mb-4">
        <label for="dormitorios_maximo" class="form-label">Dormitorios máximo</label>
        <input name="dormitorios_maximo" type="number" class="form-control" placeholder="Dormitorios máximo" id="dormitorios_maximo" aria-describedby="dormitorios_maximo"
            value="{{ old('dormitorios_maximo', $ordene->dormitorios_maximo) }}">
        @error('dormitorios_maximo')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Planta --}}
    <div class="mb-4">
        <label for="planta" class="form-label">Planta</label>
        <input name="planta" type="number" class="form-control" placeholder="Planta" id="planta" aria-describedby="planta"
            value="{{ old('planta', $ordene->planta) }}">
        @error('planta')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Número máximo de plantas --}}
    <div class="mb-4">
        <label for="numero_maximo_plantas" class="form-label">Número máximo de plantas</label>
        <input name="numero_maximo_plantas" type="number" placeholder="Número máximo de plantas" class="form-control" id="numero_maximo_plantas" aria-describedby="numero_maximo_plantas"
            value="{{ old('numero_maximo_plantas', $ordene->numero_maximo_plantas) }}">
        @error('numero_maximo_plantas')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Amueblado --}}
    <div class="mb-4">
        <label for="amueblado" class="form-label">Amueblado</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="amueblado" placeholder="Amueblado" id="amueblado_si" value="1" @if ($ordene->amueblado == 1) checked @else @endif>
            <label class="form-check-label" for="amueblado">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="amueblado" id="amueblado_no" value="0" @if ($ordene->amueblado == 0) checked @else @endif>
            <label class="form-check-label" for="amueblado">
                No
            </label>
        </div>
        @error('amueblado')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <hr>


   {{-- Ascensor --}}
   <div class="mb-4">
    <label for="ascensor" class="form-label">Ascensor</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="ascensor" id="ascensor_si" value="1" @if ($ordene->ascensor == 1) checked @else @endif>
        <label class="form-check-label" for="ascensor">
            Si
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="ascensor" id="ascensor_no" value="0" @if ($ordene->ascensor == 0) checked @else @endif>
        <label class="form-check-label" for="ascensor">
            No
        </label>
    </div>
    @error('ascensor')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<hr>


   {{-- Garaje --}}
   <div class="mb-4">
    <label for="garaje" class="form-label">Garaje</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="garaje" id="garaje_si" value="1" @if ($ordene->garaje == 1) checked @else @endif>
        <label class="form-check-label" for="garaje">
            Si
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="garaje" id="garaje_no" value="0" @if ($ordene->garaje == 0) checked @else @endif>
        <label class="form-check-label" for="garaje">
            No
        </label>
    </div>
    @error('garaje')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<hr>


   {{-- Terraza --}}
   <div class="mb-4">
    <label for="terraza" class="form-label">Terraza</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="terraza" id="terraza_si" value="1" @if ($ordene->terraza == 1) checked @else @endif>
        <label class="form-check-label" for="terraza">
            Si
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="terraza" id="terraza_no" value="0" @if ($ordene->terraza == 0) checked @else @endif>
        <label class="form-check-label" for="terraza">
            No
        </label>
    </div>
    @error('terraza')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<hr>

   {{-- Patio --}}
   <div class="mb-4">
    <label for="patio" class="form-label">Terraza</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="patio" id="patio_si" value="1" @if ($ordene->patio == 1) checked @else @endif>
        <label class="form-check-label" for="patio">
            Si
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="patio" id="patio_no" value="0" @if ($ordene->patio == 0) checked @else @endif>
        <label class="form-check-label" for="patio">
            No
        </label>
    </div>
    @error('patio')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<hr>

   {{-- Calefaccion --}}
   <div class="mb-4">
    <label for="calefaccion" class="form-label">Calefaccion</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="calefaccion" id="calefaccion_si" value="1" @if ($ordene->calefaccion == 1) checked @else @endif>
        <label class="form-check-label" for="calefaccion">
            Si
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="calefaccion" id="calefaccion_no" value="0" @if ($ordene->calefaccion == 0) checked @else @endif>
        <label class="form-check-label" for="calefaccion">
            No
        </label>
    </div>
    @error('calefaccion')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<hr>

   {{-- Aire acondicionado --}}
   <div class="mb-4">
    <label for="aire_acondicionado" class="form-label">Aire acondicionado</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="aire_acondicionado" id="aire_acondicionado_si" value="1" @if ($ordene->aire_acondicionado == 1) checked @else @endif>
        <label class="form-check-label" for="aire_acondicionado">
            Si
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="aire_acondicionado" id="aire_acondicionado_no" value="0" @if ($ordene->aire_acondicionado == 0) checked @else @endif>
        <label class="form-check-label" for="aire_acondicionado">
            No
        </label>
    </div>
    @error('aire_acondicionado')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<hr>


   {{-- Piscina --}}
   <div class="mb-4">
    <label for="piscina" class="form-label">Piscina</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="piscina" id="piscina_si" value="1" @if ($ordene->piscina == 1) checked @else @endif>
        <label class="form-check-label" for="piscina">
            Si
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="piscina" id="piscina_no" value="0" @if ($ordene->piscina == 0) checked @else @endif>
        <label class="form-check-label" for="piscina">
            No
        </label>
    </div>
    @error('piscina')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<hr>

   {{-- Jardín --}}
   <div class="mb-4">
    <label for="jardin" class="form-label">Jardín</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="jardin" id="jardin_si" value="1" @if ($ordene->jardin == 1) checked @else @endif>
        <label class="form-check-label" for="jardin">
            Si
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="jardin" id="jardin_no" value="0" @if ($ordene->jardin == 0) checked @else @endif>
        <label class="form-check-label" for="jardin">
            No
        </label>
    </div>
    @error('jardin')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<hr>

{{-- Acceso minusválidos --}}
<div class="mb-4">
 <label for="acceso_minusvalidos" class="form-label">Acceso minusválidos</label>
 <div class="form-check">
     <input class="form-check-input" type="radio" name="acceso_minusvalidos" id="acceso_minusvalidos_si" value="1" @if ($ordene->acceso_minusvalidos == 1) checked @else @endif>
     <label class="form-check-label" for="acceso_minusvalidos">
         Si
     </label>
 </div>
 <div class="form-check">
     <input class="form-check-input" type="radio" name="acceso_minusvalidos" id="acceso_minusvalidos_no" value="0" @if ($ordene->acceso_minusvalidos == 0) checked @else @endif><label>No</label>
 </div>
 @error('acceso_minusvalidos')
     <small class="text-danger">{{ $message }}</small>
 @enderror</div>
<hr>

    {{-- Situación --}}
    <div class="mb-4">
        <label for="situacion" class="form-label">Situación</label>
        <select name="situacion" id="situacion" class="form-control" value="{{ old('situacion', $ordene->situacion) }}">
            <option value="1">Situación</option>
            <option value="Primera linea de playa">Primera línea de playa</option>
            <option value="En la costa">En la costa</option>
            <option value="En el centro de la poblacion">En el centro de la población</option>
            <option value="En el campo">En el campo</option>
            <option value="En zona industrial">En zona industrial</option>
            <option value="Afueras de la poblacion">Afueras de la población</option>
        </select>
        @error('situacion')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>


    {{-- Estado de conservación --}}
    <div class="mb-4">
        <label for="estado_conservacion" class="form-label">Estado de conservación</label>
        <select name="estado_conservacion" placeholder="Estado de Conservacion" id="estado_conservacion" class="form-control" value="{{ old('estado_conservacion', $ordene->estado_conservacion) }}">
            <option value="1">Estado de conservación</option>
            <option value="Perfecto">Perfecto</option>
            <option value="Muy bueno">Muy bueno</option>
            <option value="Bueno">Bueno</option>
            <option value="Antigüo">Antigüo</option>
            <option value="Necesita arreglos">Necesita arreglos</option>
            <option value="Malo">Malo</option>
        </select>
        @error('estado_conservacion')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
<hr>

{{-- Necesidad de préstamo --}}
<div class="mb-4">
    <label for="necesita_prestamo" class="form-label">Necesidad de préstamo</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="necesita_prestamo" id="necesita_prestamo_si" value="1" @if ($ordene->necesita_prestamo == 1) checked @else @endif>
        <label class="form-check-label" for="necesita_prestamo">
            Si
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="necesita_prestamo" id="necesita_prestamo_no" value="0" @if ($ordene->necesita_prestamo == 0) checked @else @endif>
		<label>
            No
        </label>
    </div>
    @error('necesita_prestamo')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<hr>

    {{-- Observaciones --}}
    <div class="mb-4">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" type="text" class="form-control" placeholder="Observaciones" id="observaciones" aria-describedby="observaciones"> {{ old('observaciones', $ordene->observaciones) }}</textarea>
        @error('observaciones')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
        <button type="submit" class="btn btn-primary btn-sm" style="color: white;">Actualizar <i class="fas fa-edit"></i></button>
    </form>
    <br><br>
</x-app-layout>
