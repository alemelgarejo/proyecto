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
                        <a class="" style="color: black; float: left;"
                        href="{{ route('propiedades.edit', $propiedade->id) }}"><img src="{{asset('images/consent.png')}}" alt="editlogo"  style="float: left; margin: 0px 0px 0px 10px;" ></a>&nbsp;&nbsp;
                        <a class="" style="color: black; float: left;"
                        href="{{ route('files.create2', $propiedade->id) }}"><img src="{{asset('images/add.png')}}" alt="editlogo"  style="float: left; margin: 0px 0px 0px 10px;" ></a>&nbsp;&nbsp;
                        <a class="" style="color: black; float: left;"
                        href="{{ route('files.index2', $propiedade->id) }}"><img src="{{asset('images/image.png')}}" alt="editlogo"  style="float: left; margin: 2px 0px 0px 10px;width:30%;" ></a>&nbsp;&nbsp;

                        <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false" style="float: left; color: black;">
                            <section >
                                <button type="button" @click="isDialogOpen = true"><img src="{{asset('images/recycle-bin.png')}}" alt="deletelogo" style="float: left; margin: 0px 0px 0px 10px; color: black;" ></button>
                                <!-- overlay -->
                                <div class="overflow-full" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                                    <!-- dialog -->
                                    <div class="bg-white shadow-2xl m-4 sm:m-8" x-show="isDialogOpen" @click.away="isDialogOpen = false">
                                        <div class="flex justify-between items-center border-b p-2 text-xl">
                                            <h6 class="text-xl font-bold">Propiedad: {{$propiedade->direccion}}</h6>
                                            <button type="button" @click="isDialogOpen = false">✖</button>
                                        </div>
                                        <div class="p-2">
                                            <!-- content -->
                                            <h4 class="font-bold">¿Desea eliminar ésta propiedad?</h4>
                                            <aside class="max-w-lg mt-4 p-4 bg-yellow-100 border border-yellow-500">
                                                <p> - Dirección: {{$propiedade->direccion}}, <br>
                                                    - Ciudad: {{$propiedade->ciudad}}, <br>
                                                    - Estado: {{$propiedade->estado}}, <br>
                                                </p>
                                                <p>⚠ Asegurate de haber seleccionado los datos correctos.</p>
                                            </aside>
                                            <ul class="bg-gray-100 border m-8 px-4">
                                                <div class="modal-footer">
                                                    <form id="formDelete" action="{{ route('propiedades.destroy', $propiedade->id) }}" data-action="{{ route('propiedades.destroy',  $propiedade->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit">Eliminar <img src="{{asset('images/recycle-bin.png')}}" alt="deletelogo"  style="float: left; margin: 0px 0px 15px 5px;" ></button>
                                                    </form>
                                                </div>
                                            </ul>
                                        </div>
                                    </div><!-- /dialog -->
                                </div><!-- /overlay -->
                            </section>
                        </main>
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
                <a class="" style=""
                        href="{{ route('propiedades.index') }}"><img src="{{asset('images/previous.png')}}"  alt="deletelogo"  style="float: left; color: black;" > </a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>

</x-app-layout>
