<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('mispropiedades.index') }}"  style="color: rgb(111, 111, 111);">Mis propiedades</a> /
            <a href="{{ route('mispropiedades.show', $mispropiedade->id) }}"  style="color: rgb(111, 111, 111);">{{ $mispropiedade->direccion }}</a>
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
                    <h4>{{ $mispropiedade->direccion }}, {{ $mispropiedade->ciudad }}, {{ $mispropiedade->provincia }}</h4>
                    <p class="text-secondary mb-1">Pertenece a por: @if($mispropiedade->propietario==null)
                        Propietario inexistente
                    @else
                        {{ $mispropiedade->propietario->surname }}, {{ $mispropiedade->propietario->name }}
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
                        <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('mispropiedades.edit', $mispropiedade->id) }}" style="color: gray;"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                        <a data-toggle="tooltip" data-placement="top" title="Ver imágenes" href="{{ route('files.index2', $mispropiedade->id) }}" style="color: gray;"><i class="fas fa-images"></i></a>&nbsp;&nbsp;
                        <a data-toggle="tooltip" data-placement="top" title="Añadir imágenes" href="{{ route('files.create2', $mispropiedade->id) }}" style="color: gray;"><i class="fas fa-image"></i></a>&nbsp;&nbsp;
                        <!-- Button trigger modal -->
                        <button type="button" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" data-placement="top" title="Eliminar" href="" style="color: gray">
                            <i class="fas fa-trash-alt" style="color: red"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('mispropiedades.destroy', $mispropiedade->id) }}" method="POST" class="remove-record-model">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}

                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Propiedad: {{$mispropiedade->direccion}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            ¿Seguro que desea eliminar ésta propiedad?
                                            <ul>
                                                <li>- {{$mispropiedade->direccion}}</li>
                                                <li>- {{$mispropiedade->ciudad}}</li>
                                            </ul>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                    </div>
                  </div>
                  <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Estado</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$mispropiedade->estado}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Valoración</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$mispropiedade->valoracion}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Tipo</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$mispropiedade->tipo}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->superficie}} m<sup>2</sup>
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie construida</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->superficie_construida}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Número de dormitorios</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->numero_dormitorios}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Número de baños</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->numero_aseos}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Armarios empotrados</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    @if($mispropiedade->armarios_empotrados ==  1)
                        Sí
                    @elseif($mispropiedade->armarios_empotrados ==  0)
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
                    {{$mispropiedade->numero_salones}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie salones</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->superficie_salones}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Amueblado</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                      @if($mispropiedade->amueblado ==  1)
                          Sí
                      @elseif($mispropiedade->amueblado ==  0)
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
                      @if($mispropiedade->comedor_independiente ==  1)
                          Sí
                      @elseif($mispropiedade->comedor_independiente ==  0)
                          No
                      @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie comedor</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->superficie_comedor}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Tipo de cocina</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->tipo_cocina}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Cocina amueblada</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                      @if($mispropiedade->cocina_amueblada ==  1)
                          Sí
                      @elseif($mispropiedade->cocina_amueblada ==  0)
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
                    {{$mispropiedade->terrazas}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie terrazas</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->superficie_terrazas}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Balcón</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($mispropiedade->balcon ==  1)
                        Sí
                    @elseif($mispropiedade->balcon ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie balcón</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->superficie_balcon}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Patio</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($mispropiedade->patio ==  1)
                        Sí
                    @elseif($mispropiedade->patio ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie patio</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->superficie_patio}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Ubicación patio</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$mispropiedade->ubicacion_patio}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Situación</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$mispropiedade->situación}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Altura techo</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$mispropiedade->altura_techo}} m
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Garaje</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($mispropiedade->garaje ==  1)
                        Sí
                    @elseif($mispropiedade->garaje ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie garaje</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->superficie_garaje}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Trastero</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($mispropiedade->trastero ==  1)
                        Sí
                    @elseif($mispropiedade->trastero ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie trastero</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->superficie_trastero}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Sótano</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($mispropiedade->sotano ==  1)
                        Sí
                    @elseif($mispropiedade->sotano ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie sotano</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->superficie_sotano}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Calefacción</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($mispropiedade->calefaccion ==  1)
                        Sí
                    @elseif($mispropiedade->calefaccion ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Tipo de calefacción</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->tipo_calefaccion}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Aire acondicionado</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    @if($mispropiedade->aire_acondicionado ==  1)
                        Sí
                    @elseif($mispropiedade->aire_acondicionado ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Tipo de aire acondicionado</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->tipo_aire_acondicionado}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Tipo de edificio</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$mispropiedade->tipo_edificio}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Número de plantas</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->numero_plantas}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Planta</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->planta}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Ascensor</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    @if($mispropiedade->ascensor ==  1)
                        Sí
                    @elseif($mispropiedade->ascensor ==  0)
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
                    @if($mispropiedade->urbanizacion ==  1)
                        Sí
                    @elseif($mispropiedade->urbanizacion ==  0)
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
                    @if($mispropiedade->jardin ==  1)
                        Sí
                    @elseif($mispropiedade->jardin ==  0)
                        No
                    @endif
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie jardín</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->superficie_jardin}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Fecha de construcción</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$mispropiedade->fecha_construccion}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Latitud</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->latitud}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Longitud</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$mispropiedade->longitud}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Observaciones</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$mispropiedade->observaciones}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Registrado desde</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$mispropiedade->created_at->diffForHumans()}}
                  </div>
                </div>
                <hr>

              <a class="btn btn-secondary btn-sm" style=""
              href="{{ route('mispropiedades.index') }}">Volver&nbsp;&nbsp;<i class="fas fa-undo-alt"></i></a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>

</x-app-layout>
