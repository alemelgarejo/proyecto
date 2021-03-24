<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('misclientes.index') }}"  style="color: rgb(111, 111, 111);">Mis clientes</a> /
            <a href="{{ route('misclientes.show', $miscliente->id) }}"  style="color: rgb(111, 111, 111);">{{ $miscliente->name }} {{ $miscliente->surname }}</a>
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
                    <h4>{{ $miscliente->surname }}, {{$miscliente->name}}</h4>
                    <p class="text-secondary mb-1">Asesorado por: {{$miscliente->user->surname}}, {{$miscliente->user->name}}</p>
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
                        href="{{ route('misclientes.edit', $miscliente->id) }}"><i class="fas fa-edit"></i> Actualizar</a>
						<a class="btn btn-success btn-sm mt-1" href="{{ route('ordenes.create') }}"><i class="fas fa-sort"></i> Crear órden</a>
                    	<button class="btn btn-danger btn-sm mt-1" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-trash-alt"></i> Eliminar</button>
                    </div>
                  </div>
                  <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Nombre</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$miscliente->name}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Apellidos</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$miscliente->surname}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Teléfono</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$miscliente->telefono}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$miscliente->email}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">DNI</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$miscliente->dni}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Estado</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$miscliente->estado}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Dirección</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$miscliente->direccion}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Ciudad</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$miscliente->ciudad}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Provincia</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$miscliente->provincia}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Encargado</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ $miscliente->user->surname }}, {{$miscliente->user->name}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Observaciones</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$miscliente->observaciones}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Registrado desde</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$miscliente->created_at->diffForHumans()}}
                  </div>
                </div>
                <hr>
                <a class="btn btn-secondary btn-sm mt-1" style="color: white;"
                        href="{{ route('misclientes.index') }}"><i class="fas fa-undo-alt"></i>Mis clientes</a>
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
                <form id="formDelete" action="{{ route('misclientes.destroy', $miscliente->id) }}"
                    data-action="{{ route('misclientes.destroy',  $miscliente->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>  Eliminar</button>
                </form>
            </div>
        </div>
      </div>
</x-app-layout>
