<x-app-layout>
	<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
        <a href="{{ route('mispropietarios.index') }}"  style="color: rgb(111, 111, 111);">Mis propietarios</a> /
        <a href="{{ route('mispropietarios.show', $mispropietario->id) }}"  style="color: rgb(111, 111, 111);">{{ $mispropietario->name }} {{ $mispropietario->surname }}</a>
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
                  <h4>{{ $mispropietario->surname }}, {{$mispropietario->name}}</h4>
                  <p class="text-secondary mb-1">Asesorado por: @if($mispropietario->user==null)
                    Usuario inexistente
                @else
                    {{ $mispropietario->user->surname }}, {{ $mispropietario->user->name }}
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
                        href="{{ route('mispropietarios.edit', $mispropietario->id) }}"><img src="{{asset('images/consent.png')}}" alt="editlogo"  style="float: left; margin: 0px 0px 0px 10px;" ></a>&nbsp;&nbsp;
                        <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">
                            <section>
                                <button type="button" @click="isDialogOpen = true"><img src="{{asset('images/recycle-bin.png')}}" alt="deletelogo"  style="float: left; margin: 12px 0px 15px 5px;" ></button>
                                <!-- overlay -->
                                <div class="overflow-full" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                                    <!-- dialog -->
                                    <div class="bg-white shadow-2xl m-4 sm:m-8" x-show="isDialogOpen" @click.away="isDialogOpen = false">
                                        <div class="flex justify-between items-center border-b p-2 text-xl">
                                            <h6 class="text-xl font-bold">Propietario: {{$mispropietario->name}} {{$mispropietario->surname}}</h6>
                                            <button type="button" @click="isDialogOpen = false">✖</button>
                                        </div>
                                        <div class="p-2">
                                            <!-- content -->
                                            <h4 class="font-bold">¿Desea eliminar éste cliente?</h4>
                                            <aside class="max-w-lg mt-4 p-4 bg-yellow-100 border border-yellow-500">
                                                <p> - Nombre: {{$mispropietario->name}}, <br>
                                                    - Apellidos  {{$mispropietario->surname}}, <br>
                                                    - Email: {{$mispropietario->email}}, <br>
                                                    - DNI: {{$mispropietario->dni}}, <br>
                                                    - Estado: {{$mispropietario->estado}}, <br>
                                                </p>
                                                <p>⚠ Asegurate de haber seleccionado los datos correctos.</p>
                                            </aside>
                                            <ul class="bg-gray-100 border m-8 px-4">
                                                <div class="modal-footer">
                                                    <form id="formDelete" action="{{ route('mispropietarios.destroy', $mispropietario->id) }}" data-action="{{ route('mispropietarios.destroy',  $mispropietario->id) }}" method="POST">
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
                  <h6 class="mb-0">Nombre</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$mispropietario->name}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Apellidos</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$mispropietario->surname}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Teléfono</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$mispropietario->telefono}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$mispropietario->email}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">DNI</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$mispropietario->dni}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Estado</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$mispropietario->estado}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Dirección</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$mispropietario->direccion}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Ciudad</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$mispropietario->ciudad}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Provincia</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$mispropietario->provincia}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Encargado</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $mispropietario->user->surname }}, {{$mispropietario->user->name}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Observaciones</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$mispropietario->observaciones}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Registrado desde</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$mispropietario->created_at->diffForHumans()}}
                </div>
              </div>
              <hr>
              <a class="" style=""
                        href="{{ route('mispropietarios.index') }}"><img src="{{asset('images/previous.png')}}"  alt="deletelogo"  style="float: left; color: black;" > </a>
            </div>
          </div>
          </div>
        </div>
      </div>
      </div>
      <br><br>
</x-app-layout>
