<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('propiedades.index') }}" style="color: rgb(111, 111, 111);">Propiedades</a> /
            <a href="{{ route('propiedades.edit', $propiedade->id) }}" style="color: rgb(111, 111, 111);">Editar
                propiedad</a>
        </h2>
    </x-slot>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <br>

    <form method="POST" action="{{ route('propiedades.update', $propiedade->id) }}" class="mx-40" style="min-width: 40%;">
        @csrf
        @method('PUT')

        {{-- Propietario --}}
        <div class="mb-4">
            <label for="propietario_id" class="form-label">Propietario</label>
            <select class="form-control" placeholder="Propietario"   name="propietario_id" id="propietario_id">
                @foreach ($propietarios as $name => $id)
                    <option {{ $propiedade->propietario_id == $id ? 'selected="selected"' : '' }}
                        value="{{ $id }}">
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
            <select name="estado" placeholder="Estado"   id="estado" class="form-control" value="{{ old('estado', $propiedade->estado) }}">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
                <option value="Vendida">Vendida</option>
            </select>
            @error('estado')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Valoración --}}
        <div class="mb-4">
            <label for="valoracion" class="form-label">Valor</label>
            <input name="valoracion" placeholder="Valoración"  type="number" class="form-control" id="valoracion" aria-describedby="valoracion"
                value="{{ old('valoracion', $propiedade->valoracion) }}">
            @error('valoracion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Tipo de propiedad --}}
        <div class="mb-4">
            <label for="tipo" class="form-label">Tipo de propiedad</label>
            <select name="tipo" placeholder="Tipo de propiedad" id="tipo" class="form-control" value="{{ old('tipo', $propiedade->tipo) }}">
                <option value="1">Tipo de propiedad</option>
                <option value="Casa terrera">Casa terrera</option>
                <option value="Piso">Piso</option>
                <option value="Estudio">Estudio</option>
                <option value="Local">Local</option>
                <option value="Nave">Nave</option>
                <option value="Negocio">Negocio</option>
            </select>
            @error('tipo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
		
		{{-- Tipo de interes --}}
        <div class="mb-4">
            <label for="tipo_interes" class="form-label">¿Qué desea hacer con su propiedad?</label>
            <select name="tipo_interes" placeholder="¿Qué desea hacer con su propiedad?" id="tipo" class="form-control" value="{{ old('tipo_interes', $propiedade->tipo_interes) }}">
                <option value="1">¿Qué desea hacer con su propiedad?</option>
                <option value="Venta">Venta</option>
                <option value="Alquiler">Alquiler</option>
                <option value="Traspaso">Traspaso</option>
            </select>
            @error('tipo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Dirección --}}
        <div class="mb-4">
            <label for="direccion" class="form-label">Dirección</label>
            <input name="direccion" placeholder="Dirección" type="text" class="form-control" id="direccion" aria-describedby="direccion"
                value="{{ old('direccion', $propiedade->direccion) }}">
            @error('direccion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Ciudad --}}
        <div class="mb-4">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input name="ciudad" placeholder="Ciudad" type="text" class="form-control" id="ciudad" aria-describedby="ciudad"
                value="{{ old('ciudad', $propiedade->ciudad) }}">
            @error('ciudad')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Provincia --}}
        <div class="mb-4">
            <label for="provincia" class="form-label">Provincia</label>
            <input name="provincia" placeholder="Provincia"  type="text" class="form-control" id="provincia" aria-describedby="provincia"
                value="{{ old('provincia', $propiedade->provincia) }}">
            @error('provincia')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-row">
        {{-- Superficie --}}
        <div class="form-group col-md-6">
            <label for="superficie">Superficie</label>
            <input name="superficie" type="number" placeholder="Superficie"  class="form-control" id="superficie" aria-describedby="superficie"
                value="{{ old('superficie', $propiedade->superficie) }}">
            @error('superficie')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Superficie construida --}}
        <div class="form-group col-md-6">
            <label for="superficie_construida" >Superficie Construida</label>
            <input name="superficie_construida" placeholder="Superficie construida"  type="number" class="form-control" id="superficie_construida"
                aria-describedby="superficie_construida"
                value="{{ old('superficie_construida', $propiedade->superficie_construida) }}">
            @error('superficie_construida')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        </div>
        <hr>

        <div class="form-row">
        {{-- Numero de dormitorios --}}
        <div class="form-group col-md-6">
            <label for="numero_dormitorios">Número de dormitorios</label>
            <input name="numero_dormitorios" placeholder="Número de dormitorios"  type="number" class="form-control" id="numero_dormitorios"
                aria-describedby="numero_dormitorios"
                value="{{ old('numero_dormitorios', $propiedade->numero_dormitorios) }}">
            @error('numero_dormitorios')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Numero de aseos --}}
        <div class="form-group col-md-6">
            <label for="numero_aseos">Número de baños</label>
            <input name="numero_aseos" type="number" placeholder="Número de baños"  class="form-control" id="numero_aseos"
                aria-describedby="numero_aseos" value="{{ old('numero_aseos', $propiedade->numero_aseos) }}">
            @error('numero_aseos')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        </div>
        <hr>
        {{-- Armarios empotrados --}}
        <div class="mb-4">
            <label for="armarios_empotrados">Armarios empotrados</label>
            <input name="armarios_empotrados" type="number" placeholder="Número de baños"  class="form-control" id="armarios_empotrados"
                aria-describedby="armarios_empotrados" value="{{ old('armarios_empotrados', $propiedade->armarios_empotrados) }}">
            @error('armarios_empotrados')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <hr>
        <div class="form-row">
        {{-- Numero de salones --}}
        <div class="form-group col-md-6">
            <label for="numero_salones" >Número de salones</label>
            <input name="numero_salones" type="number" placeholder="Número de salones"  class="form-control" id="numero_salones"
                aria-describedby="numero_salones" value="{{ old('numero_salones', $propiedade->numero_salones) }}">
            @error('numero_salones')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Superficie de salones --}}
        <div class="form-group col-md-6">
            <label for="superficie_salones">Superficie de salones</label>
            <input name="superficie_salones" type="number" placeholder="Superficie de salones"  class="form-control" id="superficie_salones"
                aria-describedby="superficie_salones"
                value="{{ old('superficie_salones', $propiedade->superficie_salones) }}">
            @error('superficie_salones')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        </div>
        <hr>

        {{-- Amueblado --}}
        <div class="mb-4">
            <label for="amueblado" class="form-label">Amueblado</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="amueblado" id="amueblado_si" value="1" @if ($propiedade->amueblado == 1) checked @else @endif>
                <label class="form-check-label" for="amueblado">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="amueblado" id="amueblado_no" value="0" @if ($propiedade->amueblado == 0) checked @else @endif>
                <label class="form-check-label" for="amueblado">
                    No
                </label>
            </div>
            @error('amueblado')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <hr>
        <div class="form-row">
        {{-- Comedor independiente --}}
        <div class="form-group col-md-2">
            <label for="comedor_independiente">Comedor independiente</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="comedor_independiente" id="comedor_independiente_si"
                    value="1" @if ($propiedade->comedor_independiente == 1) checked @else @endif>
                <label class="form-check-label" for="comedor_independiente">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="comedor_independiente" id="comedor_independiente_no"
                    value="0" @if ($propiedade->comedor_independiente == 0) checked @else @endif>
                <label class="form-check-label" for="comedor_independiente">
                    No
                </label>
            </div>
            @error('comedor_independiente')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Superficie de comedor --}}
        <div class="form-group col-md-10">
            <label for="superficie_comedor" >Superficie comedor</label>
            <input name="superficie_comedor" type="number" placeholder="Superficie comedor"  class="form-control" id="superficie_comedor"
                aria-describedby="superficie_comedor"
                value="{{ old('superficie_comedor', $propiedade->superficie_comedor) }}">
            @error('superficie_comedor')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        </div>
        <hr>

        <div class="form-row">

        {{-- Cocina amueblada --}}
        <div class="form-group col-md-2">
            <label for="cocina_amueblada" class="form-label">Cocina amueblada</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="cocina_amueblada" id="cocina_amueblada_si" value="1"
                    @if ($propiedade->cocina_amueblada == 1) checked @else @endif>
                <label class="form-check-label" for="cocina_amueblada">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="cocina_amueblada" id="cocina_amueblada_no" value="0"
                    @if ($propiedade->cocina_amueblada == 0) checked @else @endif>
                <label class="form-check-label" for="cocina_amueblada">
                    No
                </label>
            </div>
            @error('cocina_amueblada')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        {{-- Tipo cocina --}}
        <div class="form-group col-md-10">
            <label for="tipo_cocina" class="form-label">Tipo de cocina</label>
            <input name="tipo_cocina" type="text" placeholder="Tipo de cocina" class="form-control" id="tipo_cocina" aria-describedby="tipo_cocina"
                value="{{ old('tipo_cocina', $propiedade->tipo_cocina) }}">
            @error('tipo_cocina')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        </div>
        <hr>

        <div class="form-row">
        {{-- Terrazas --}}
        <div class="form-group col-md-6">
            <label for="terrazas" class="form-label">Terrazas</label>
            <input name="terrazas" type="number" class="form-control" placeholder="Terrazas"  id="terrazas" aria-describedby="terrazas"
                value="{{ old('terrazas', $propiedade->terrazas) }}">
            @error('terrazas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Superficie terrazas --}}
        <div class="form-group col-md-6">
            <label for="superficie_terrazas" class="form-label">Superficie terrazas</label>
            <input name="superficie_terrazas" type="number" placeholder="Superficie terrazas"  class="form-control" id="superficie_terrazas"
                aria-describedby="superficie_terrazas"
                value="{{ old('superficie_terrazas', $propiedade->superficie_terrazas) }}">
            @error('superficie_terrazas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        </div>
        <hr>

        <div class="form-row">
        {{-- Balcón --}}
        <div class="form-group col-md-2">
            <label for="balcon">Balcón</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="balcon" id="balcon_si" value="1"
                    @if ($propiedade->balcon == 1) checked @else @endif>
                <label class="form-check-label" for="balcon">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="balcon" id="balcon_no" value="0"
                    @if ($propiedade->balcon == 0) checked @else @endif>
                <label class="form-check-label" for="balcon">
                    No
                </label>
            </div>
            @error('balcon')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Superficie balcon --}}
        <div class="form-group col-md-10">
            <label for="superficie_balcon">Superficie balcón</label>
            <input name="superficie_balcon" type="number" placeholder="Superficie balcón"   class="form-control" id="superficie_balcon"
                aria-describedby="superficie_balcon"
                value="{{ old('superficie_balcon', $propiedade->superficie_balcon) }}">
            @error('superficie_balcon')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        </div>


        <hr>
        <div class="form-row">
        {{-- Patio --}}
        <div class="form-group col-md-2">
            <label for="patio">Patio</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="patio" id="patio_si" value="1"
                    @if ($propiedade->patio == 1) checked @else @endif>
                <label class="form-check-label" for="patio">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="patio" id="patio_no" value="0"
                    @if ($propiedade->patio == 0) checked @else @endif>
                <label class="form-check-label" for="patio">
                    No
                </label>
            </div>
            @error('patio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        {{-- Superficie patio --}}
        <div class="form-group col-md-5">
            <label for="superficie_patio">Superficie patio</label>
            <input name="superficie_patio" type="number" placeholder="Superficie patio"  class="form-control" id="superficie_patio"
                aria-describedby="superficie_patio"
                value="{{ old('superficie_patio', $propiedade->superficie_patio) }}">
            @error('superficie_patio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Ubicacion patio --}}
        <div class="form-group col-md-5">
            <label for="ubicacion_patio">Ubicacion patio</label>
            <input name="ubicacion_patio" type="text"  placeholder="Ubicación patio"  class="form-control" id="ubicacion_patio"
                aria-describedby="ubicacion_patio"
                value="{{ old('ubicacion_patio', $propiedade->ubicacion_patio) }}">
            @error('ubicacion_patio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        </div>
        <hr>

        {{-- Situacion --}}
        <div class="mb-4">
            <label for="situacion" class="form-label">Situación</label>
            <input name="situacion" type="text" class="form-control" placeholder="Situación"  id="situacion" aria-describedby="situacion"
                value="{{ old('situacion', $propiedade->situacion) }}">
            @error('situacion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Altura techo --}}
        <div class="mb-4">
            <label for="altura_techo" class="form-label">Altura techo</label>
            <input name="altura_techo" type="number" placeholder="Altura techo"  class="form-control" id="altura_techo"
                aria-describedby="altura_techo" value="{{ old('altura_techo', $propiedade->altura_techo) }}">
            @error('altura_techo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <hr>

        <div class="form-row">
        {{-- Garaje --}}
        <div class="form-group col-md-2">
            <label for="garaje">Garaje</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="garaje" id="garaje_si" value="1" @if ($propiedade->garaje == 1) checked @else @endif>
                <label class="form-check-label" for="garaje">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="garaje" id="garaje_no" value="0" @if ($propiedade->garaje == 0) checked @else @endif>
                <label class="form-check-label" for="garaje">
                    No
                </label>
            </div>
            @error('garaje')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Superficie garaje --}}
        <div class="form-group col-md-10">
            <label for="superficie_garaje">Superficie garaje</label>
            <input name="superficie_garaje" type="number" placeholder="Superficie garaje"  class="form-control" id="superficie_garaje"
                aria-describedby="superficie_garaje"
                value="{{ old('superficie_garaje', $propiedade->superficie_garaje) }}">
            @error('superficie_garaje')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        </div>
        <hr>

        <div class="form-row">
        {{-- Trastero --}}
        <div class="form-group col-md-2">
            <label for="trastero">Trastero</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trastero" id="trastero_si" value="1" @if ($propiedade->trastero == 1) checked @else @endif>
                <label class="form-check-label" for="trastero">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trastero" id="trastero_no" value="0" @if ($propiedade->trastero == 0) checked @else @endif>
                <label class="form-check-label" for="trastero">
                    No
                </label>
            </div>
            @error('trastero')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Superficie trastero --}}
        <div class="form-group col-md-10">
            <label for="superficie_trastero">Superficie trastero</label>
            <input name="superficie_trastero" type="number"  placeholder="Superficie trastero"  class="form-control" id="superficie_trastero"
                aria-describedby="superficie_trastero"
                value="{{ old('superficie_trastero', $propiedade->superficie_trastero) }}">
            @error('superficie_trastero')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        </div>
        <hr>

        <div class="form-row">
        {{-- Sótano --}}
        <div class="form-group col-md-2">
            <label for="sotano" class="form-label">Sótano</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sotano" id="sotano_si" value="1" @if ($propiedade->sotano == 1) checked @else @endif>
                <label class="form-check-label" for="sotano">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sotano" id="sotano_no" value="0" @if ($propiedade->sotano == 0) checked @else @endif>
                <label class="form-check-label" for="sotano">
                    No
                </label>
            </div>
            @error('sotano')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Superficie sotano --}}
        <div class="form-group col-md-10">
            <label for="superficie_sotano">Superficie sotano</label>
            <input name="superficie_sotano" type="number" placeholder="Superficie sótano"  class="form-control" id="superficie_sotano"
                aria-describedby="superficie_sotano"
                value="{{ old('superficie_sotano', $propiedade->superficie_sotano) }}">
            @error('superficie_sotano')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <hr>

        <div class="form-row">
        {{-- Calefacción --}}
        <div class="form-group col-md-2">
            <label for="calefaccion">Calefacción</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="calefaccion" id="calefaccion_si" value="1" @if ($propiedade->calefaccion == 1) checked @else @endif>
                <label class="form-check-label" for="calefaccion">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="calefaccion" id="calefaccion_no" value="0" @if ($propiedade->calefaccion == 0) checked @else @endif>
                <label class="form-check-label" for="calefaccion">
                    No
                </label>
            </div>
            @error('calefaccion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Tipo de calefaccion --}}
        <div class="form-group col-md-10">
            <label for="tipo_calefaccion" >Tipo de calefaccion</label>
            <input name="tipo_calefaccion" type="text" placeholder="Tipo de calefacción"  class="form-control" id="tipo_calefaccion"
                aria-describedby="tipo_calefaccion"
                value="{{ old('tipo_calefaccion', $propiedade->tipo_calefaccion) }}">
            @error('tipo_calefaccion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        </div>
        <hr>


        <div class="form-row">
        {{-- Aire acondicionado --}}
        <div class="form-group col-md-2">
            <label for="aire_acondicionado">Aire acondicionado</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="aire_acondicionado" id="aire_acondicionado_si"
                    value="1" @if ($propiedade->aire_acondicionado == 1) checked @else @endif>
                <label class="form-check-label" for="aire_acondicionado">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="aire_acondicionado" id="aire_acondicionado_no"
                    value="0" @if ($propiedade->aire_acondicionado == 0) checked @else @endif>
                <label class="form-check-label" for="aire_acondicionado">
                    No
                </label>
            </div>
            @error('aire_acondicionado')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Tipo de aire acondicionado --}}
        <div class="form-group col-md-10">
            <label for="tipo_aire_acondicionado">Tipo de aire acondicionado</label>
            <input name="tipo_aire_acondicionado" type="text" placeholder="Tipo de aire acondicionado"  class="form-control" id="tipo_aire_acondicionado"
                aria-describedby="tipo_aire_acondicionado"
                value="{{ old('tipo_aire_acondicionado', $propiedade->tipo_aire_acondicionado) }}">
            @error('tipo_aire_acondicionado')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        </div>
        <hr>

        {{-- Tipo de edificio --}}
        <div class="mb-4">
            <label for="tipo_edificio" class="form-label">Tipo de edificio</label>
            <input name="tipo_edificio" type="text" placeholder="Tipo de edificio"  class="form-control" id="tipo_edificio"
                aria-describedby="tipo_edificio" value="{{ old('tipo_edificio', $propiedade->tipo_edificio) }}">
            @error('tipo_edificio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-row">
            {{-- Número de plantas --}}
            <div class="form-group col-md-4">
                <label for="numero_plantas">Número de plantas</label>
                <input name="numero_plantas" type="number" placeholder="Número de plantas"  class="form-control" id="numero_plantas"
                    aria-describedby="numero_plantas" value="{{ old('numero_plantas', $propiedade->numero_plantas) }}">
                @error('numero_plantas')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- PLanta --}}
            <div class="form-group col-md-8">
                <label for="planta">Planta</label>
                <input name="planta" type="number" placeholder="Planta"  class="form-control" id="planta" aria-describedby="planta"
                    value="{{ old('planta', $propiedade->planta) }}">
                @error('planta')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <hr>

        {{-- Ascensor --}}
        <div class="mb-4">
            <label for="ascensor" class="form-label">Ascensor</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="ascensor" id="ascensor_si" value="1" @if ($propiedade->ascensor == 1) checked @else @endif>
                <label class="form-check-label" for="ascensor">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="ascensor" id="ascensor_no" value="0" @if ($propiedade->ascensor == 0) checked @else @endif>
                <label class="form-check-label" for="ascensor">
                    No
                </label>
            </div>
            @error('ascensor')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <hr>

        {{-- Urbanización --}}
        <div class="mb-4">
            <label for="urbanizacion" class="form-label">Urbanización</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="urbanizacion" id="urbanizacion_si" value="1" @if ($propiedade->urbanizacion == 1) checked @else @endif>
                <label class="form-check-label" for="urbanizacion">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="urbanizacion" id="urbanizacion_no" value="0" @if ($propiedade->urbanizacion == 0) checked @else @endif>
                <label class="form-check-label" for="urbanizacion">
                    No
                </label>
            </div>
            @error('urbanizacion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <hr>
        <div class="form-row">
            {{-- Jardín --}}
            <div class="form-group col-md-2">
                <label for="jardin" class="form-label">Jardín</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jardin" id="jardin_si" value="1" @if ($propiedade->jardin == 1) checked @else @endif>
                    <label class="form-check-label" for="jardin">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jardin" id="jardin_no" value="0" @if ($propiedade->jardin == 0) checked @else @endif>
                    <label class="form-check-label" for="jardin">
                        No
                    </label>
                </div>
                @error('jardin')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>

        {{-- Superficie jardín --}}
        <div class="form-group col-md-10">
            <label for="superficie_jardin" class="form-label">Superficie jardín</label>
            <input name="superficie_jardin" type="number" class="form-control" placeholder="Superficie jardín"  id="superficie_jardin"
                aria-describedby="superficie_jardin"
                value="{{ old('superficie_jardin', $propiedade->superficie_jardin) }}">
            @error('superficie_jardin')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <hr>

        {{-- Fecha de construcción --}}
        <div class="mb-4">
            <label for="fecha_construccion" class="form-label">Fecha de construcción</label>
            <input name="fecha_construccion" type="date" class="form-control" placeholder="Fecha de construcción"  id="fecha_construccion"
                aria-describedby="fecha_construccion"
                value="{{ old('fecha_construccion', $propiedade->fecha_construccion) }}">
            @error('fecha_construccion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Estado de conservación --}}
        <div class="mb-4">
            <label for="estado_conservacion" class="form-label">Estado de conservación</label>
            <select name="estado_conservacion" placeholder="Estado de Conservacion" id="estado_conservacion" class="form-control" value="{{ old('estado_conservacion', $propiedade->estado_conservacion) }}">
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

        <div class="form-row">
            {{-- Latitud --}}
            <div class="form-group col-md-6">
                <label for="latitud">Latitud</label>
                <input name="longitud" type="text" class="form-control" id="longitud" placeholder="Latitud" aria-describedby="longitud"
                    value="{{ old('longitud', $propiedade->longitud) }}">
                @error('longitud')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            {{-- Longitud --}}
            <div class="form-group col-md-6">
                <label for="longitud">Longitud</label>
                <input name="longitud" type="text" class="form-control" id="longitud" placeholder="Longitud" aria-describedby="longitud"
                    value="{{ old('longitud', $propiedade->longitud) }}">
                @error('longitud')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
          </div>
          <hr>

        {{-- Google map --}}
        <div class="mb-4">
            <label for="google_maps" class="form-label">Google maps URL</label>
            <input name="google_maps" type="text" class="form-control" id="google_maps" aria-describedby="google_maps"
                value="{{ old('google_maps', $propiedade->google_maps) }}">
            @error('google_maps')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm" style="color: white;"><i class="fas fa-edit"></i> Actualizar</button>
    </form>
    <br><br>
</x-app-layout>
