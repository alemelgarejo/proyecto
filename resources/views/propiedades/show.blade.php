<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('propiedades.index') }}"  style="color: rgb(111, 111, 111);">Propiedades</a> /
            <a href="{{ route('propiedades.show', $propiedade->id) }}"  style="color: rgb(111, 111, 111);">{{ $propiedade->direccion }}</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <br>
    <div class="main-body" style="width: 95%; margin:0 auto;">


        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4>{{ $propiedade->direccion }}, {{ $propiedade->ciudad }}, {{ $propiedade->provincia }}</h4>
                    <p class="text-secondary mb-1">Pertenece a por: @if($propiedade->propietario==null)
                        Propietario inexistente
                    @else
                        {{ $propiedade->propietario->surname }}, {{ $propiedade->propietario->name }}
                    @endif</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gestión</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <a class="btn btn-warning btn-sm mt-1" style="color: white;"
                        href="{{ route('propiedades.edit', $propiedade->id) }}"><i class="fas fa-edit"></i> Actualizar</a>

                        <button class="btn btn-danger btn-sm mt-1" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-trash-alt"></i> Eliminar</button>
                    </div>
                  </div>
                  <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Estado</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$propiedade->estado}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Valoración</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$propiedade->valoracion}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Tipo</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$propiedade->tipo}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->superficie}} m<sup>2</sup>
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie construida</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->superficie_construida}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Número de dormitorios</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->numero_dormitorios}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Número de baños</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->numero_aseos}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Armarios empotrados</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    @if($propiedade->armarios_empotrados ==  1)
                        Sí
                    @elseif($propiedade->armarios_empotrados ==  0)
                        No
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Número de salones</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->numero_salones}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie salones</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->superficie_salones}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Amueblado</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                      @if($propiedade->amueblado ==  1)
                          Sí
                      @elseif($propiedade->amueblado ==  0)
                          No
                      @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Comedor independiente</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                      @if($propiedade->comedor_independiente ==  1)
                          Sí
                      @elseif($propiedade->comedor_independiente ==  0)
                          No
                      @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie comedor</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->superficie_comedor}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Tipo de cocina</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->tipo_cocina}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Cocina amueblada</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                      @if($propiedade->cocina_amueblada ==  1)
                          Sí
                      @elseif($propiedade->cocina_amueblada ==  0)
                          No
                      @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Terrazas</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->terrazas}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie terrazas</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->superficie_terrazas}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Balcón</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($propiedade->balcon ==  1)
                        Sí
                    @elseif($propiedade->balcon ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie balcón</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->superficie_balcon}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Patio</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($propiedade->patio ==  1)
                        Sí
                    @elseif($propiedade->patio ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie patio</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->superficie_patio}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Ubicación patio</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$propiedade->ubicacion_patio}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Situación</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$propiedade->situación}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Altura techo</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$propiedade->altura_techo}} m
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Garaje</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($propiedade->garaje ==  1)
                        Sí
                    @elseif($propiedade->garaje ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie garaje</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->superficie_garaje}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Trastero</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($propiedade->trastero ==  1)
                        Sí
                    @elseif($propiedade->trastero ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie trastero</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->superficie_trastero}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Sótano</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($propiedade->sotano ==  1)
                        Sí
                    @elseif($propiedade->sotano ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie sotano</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->superficie_sotano}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Calefacción</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($propiedade->calefaccion ==  1)
                        Sí
                    @elseif($propiedade->calefaccion ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Tipo de calefacción</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->tipo_calefaccion}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Aire acondicionado</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($propiedade->aire_acondicionado ==  1)
                        Sí
                    @elseif($propiedade->aire_acondicionado ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Tipo de aire acondicionado</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->tipo_aire_acondicionado}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Tipo de edificio</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$propiedade->tipo_edificio}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Número de plantas</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->numero_plantas}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Planta</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->planta}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Ascensor</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    @if($propiedade->ascensor ==  1)
                        Sí
                    @elseif($propiedade->ascensor ==  0)
                        No
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Urbanización</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    @if($propiedade->urbanizacion ==  1)
                        Sí
                    @elseif($propiedade->urbanizacion ==  0)
                        No
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Jardín</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($propiedade->jardin ==  1)
                        Sí
                    @elseif($propiedade->jardin ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie jardín</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->superficie_jardin}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Fecha de construcción</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$propiedade->fecha_construccion}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Latitud</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->latitud}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Longitud</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$propiedade->longitud}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Observaciones</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$propiedade->observaciones}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Registrado desde</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$propiedade->created_at->diffForHumans()}}
                  </div>
                </div>
                <hr>
                <a class="btn btn-secondary btn-sm mt-1" style="color: white;"
                        href="{{ route('propiedades.index') }}"><i class="fas fa-undo-alt"></i> Propiedades</a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>

      <div id="id01" class="modal" style="width:300px; margin-top:15%; margin-left:39%;  margin-right:39%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar el registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="document.getElementById('id01').style.display='none'"  data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <form id="formDelete" action="{{ route('propiedades.destroy', $propiedade->id) }}"
                    data-action="{{ route('propiedades.destroy',  $propiedade->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
      </div>
</x-app-layout>
