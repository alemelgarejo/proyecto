<x-app-layout>
	<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
        <a href="{{ route('propietarios.index') }}"  style="color: rgb(111, 111, 111);">Propietarios</a> /
        <a href="{{ route('propietarios.show', $propietario->id) }}"  style="color: rgb(111, 111, 111);">{{ $propietario->name }} {{ $propietario->surname }}</a>
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
                  <h4>{{ $propietario->surname }}, {{$propietario->name}}</h4>
                  <p class="text-secondary mb-1">Asesorado por: @if($propietario->user==null)
                    Usuario inexistente
                @else
                    {{ $propietario->user->surname }}, {{ $propietario->user->name }}
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
                    <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('propietarios.edit', $propietario->id) }}" style="color: gray;"><i class="fas fa-edit"></i></a>&nbsp;
                    <!-- Button trigger modal -->
                    <button type="button" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" data-placement="top" title="Eliminar" href="" style="color: gray">
                        <i class="fas fa-trash-alt" style="color: red"></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('propietarios.destroy', $propietario->id) }}" method="POST" class="remove-record-model">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}

                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Propietario: {{$propietario->name}} {{$propietario->surname}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        ¿Seguro que desea eliminar éste propietario?
                                        <ul>
                                            <li>- {{$propietario->name}} {{$propietario->surname}}</li>
                                            <li>- {{$propietario->telefono}}</li>
                                            <li>- {{$propietario->email}}</li>
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
                  <h6 class="mb-0">Nombre</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$propietario->name}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Apellidos</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$propietario->surname}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Teléfono</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$propietario->telefono}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$propietario->email}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">DNI</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$propietario->dni}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Estado</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$propietario->estado}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Dirección</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$propietario->direccion}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Ciudad</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$propietario->ciudad}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Provincia</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$propietario->provincia}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Encargado</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $propietario->user->surname }}, {{$propietario->user->name}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Observaciones</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$propietario->observaciones}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Registrado desde</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{$propietario->created_at->diffForHumans()}}
                </div>
              </div>
              <hr>
                <a class="btn btn-secondary btn-sm" style=""
                href="{{ route('propietarios.index') }}">Volver&nbsp;&nbsp;<i class="fas fa-undo-alt"></i></a>
            </div>
          </div>
          </div>
        </div>
      </div>
      </div>
      <br><br>

</x-app-layout>
