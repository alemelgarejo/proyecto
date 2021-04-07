<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('clientes.index') }}"  style="color: rgb(111, 111, 111);">Clientes</a> /
            <a href="{{ route('clientes.show', $cliente->id) }}"  style="color: rgb(111, 111, 111);">{{ $cliente->name }} {{ $cliente->surname }}</a>
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
                    <h4>{{ $cliente->surname }}, {{$cliente->name}}</h4>
                    <p class="text-secondary mb-1">Asesorado por: {{$cliente->user->surname}}, {{$cliente->user->name}}</p>
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
                        <a class="" style="float: left; color: black;"
                        href="{{ route('clientes.edit', $cliente->id) }}"><img src="{{asset('images/consent.png')}}" alt="editlogo"  style="float: left; margin: 0px 0px 0px 10px;" > Actualizar</a>
						<a class="" style="float: left; color: black;" href="{{ route('ordenes.create') }}"><i style="float: left; margin: 0px 0px 0px 10px;" class="fas fa-sort"></i> Crear órden</a>
                        <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false"  style="float: left; color: black;">
                            <section>
                                <button type="button" @click="isDialogOpen = true"><img src="{{asset('images/recycle-bin.png')}}" alt="deletelogo" style="float: left; margin: 0px 0px 0px 10px; color: black;" > Eliminar</button>
                                <!-- overlay -->
                                <div class="overflow-full" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                                    <!-- dialog -->
                                    <div class="bg-white shadow-2xl m-4 sm:m-8" x-show="isDialogOpen" @click.away="isDialogOpen = false">
                                        <div class="flex justify-between items-center border-b p-2 text-xl">
                                            <h6 class="text-xl font-bold">Cliente: {{$cliente->name}}, {{$cliente->surname}}</h6>
                                            <button type="button" @click="isDialogOpen = false">✖</button>
                                        </div>
                                        <div class="p-2">
                                            <!-- content -->
                                            <h4 class="font-bold">¿Desea eliminar éste cliente?</h4>
                                            <aside class="max-w-lg mt-4 p-4 bg-yellow-100 border border-yellow-500">
                                                <p> - Nombre: {{$cliente->name}}, <br>
                                                    - Apellidos: {{$cliente->surname}}, <br>
                                                    - Email: {{$cliente->email}}, <br>
                                                    - DNI: {{$cliente->dni}}, <br>
                                                    - Estado: {{$cliente->estado}}, <br>
                                                </p>
                                                <p>⚠ Asegurate de haber seleccionado los datos correctos.</p>
                                            </aside>
                                            <ul class="bg-gray-100 border m-8 px-4">
                                                <div class="modal-footer">
                                                    <form id="formDelete" action="{{ route('clientes.destroy', $cliente->id) }}" data-action="{{ route('clientes.destroy',  $cliente->id) }}" method="POST">
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
                    {{$cliente->name}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Apellidos</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$cliente->surname}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Teléfono</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$cliente->telefono}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$cliente->email}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">DNI</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$cliente->dni}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Estado</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$cliente->estado}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Dirección</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$cliente->direccion}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Ciudad</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$cliente->ciudad}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Provincia</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$cliente->provincia}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Encargado</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    @if($cliente->user==null)
						Usuario inexistente
					@else
						{{$cliente->user->surname}}, {{ $cliente->user->name }}
					@endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Observaciones</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$cliente->observaciones}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Registrado desde</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$cliente->created_at->diffForHumans()}}
                  </div>
                </div>
                <hr>
                <a class="btn btn-secondary btn-sm mt-1" style="color: white;"
                        href="{{ route('clientes.index') }}"><i class="fas fa-undo-alt"></i> Clientes</a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
