<x-app-layout>
	<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
        <a href="{{ route('propietarios.index') }}"  style="color: rgb(111, 111, 111);">Propietarios</a> /
        <a href="{{ route('propietarios.show') }}"  style="color: rgb(111, 111, 111);">{{ $propietario->name }} {{ $propietario->surname }}</a>
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
                  <p class="text-secondary mb-1">Asesorado por: {{$propietario->user->surname}}, {{$propietario->user->name}}</p>
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
            </div>
          </div>
          </div>
        </div>
      </div>
      </div>
      <br><br>
</x-app-layout>