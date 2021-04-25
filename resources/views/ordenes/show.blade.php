<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('ordenes.index') }}"  style="color: rgb(111, 111, 111);">Órdenes</a> /
            <a href="{{ route('ordenes.show', $ordene->id) }}"  style="color: rgb(111, 111, 111);">{{ $ordene->cliente->name }}</a>
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
                    <h4>Pertenece a : @if($ordene->cliente==null)
                        Cliente inexistente
                    @elseif ($ordene->cliente)
                        {{ $ordene->cliente->surname }}, {{ $ordene->cliente->name }}
                    @endif</h4>
                    <p class="text-secondary mb-1">{{ $ordene->ciudad }}</p>
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
                        <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('ordenes.edit', $ordene->id) }}" style="color: gray;"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                        <!-- Button trigger modal -->
                        <button type="button" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" data-placement="top" title="Eliminar" href="" style="color: gray">
                            <i class="fas fa-trash-alt" style="color: red"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('ordenes.destroy', $ordene->id) }}" method="POST" class="remove-record-model">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}

                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar örden: {{$ordene->cliente->name}} {{$ordene->ciudad}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            ¿Seguro que desea eliminar éste cliente?
                                            <ul>
                                                <li>- {{$ordene->cliente->name}}</li>
                                                <li>- {{$ordene->ciudad}}</li>
                                                <li>- {{$ordene->tipo}}</li>
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
                    <h6 class="mb-0">Cliente</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$ordene->cliente->surname}}, {{ $ordene->cliente->name }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Fecha</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{\Carbon\Carbon::parse($ordene->created_at)->format('d/m/Y')}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Ciudad</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$ordene->ciudad}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Tipo de órden</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$ordene->tipo_orden}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Tipo de propiedad</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$ordene->tipo_propiedad}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Precio mínimo</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$ordene->precio_minimo}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Precio máximo</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$ordene->precio_maximo}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Superficie mínima</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$ordene->superficie_minima}} m<sup>2</sup>
                  </div>
					<div class="col-sm-3">
                    <h6 class="mb-0">Superficie máxima</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$ordene->superficie_maxima}} m<sup>2</sup>
                  </div>
                </div>
                <hr>
				  <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Dormitorios mínimo</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$ordene->dormitorios_minimo}}
                  </div>
					<div class="col-sm-3">
                    <h6 class="mb-0">Dormitorios máximo</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$ordene->dormitorios_maximo}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Planta</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$ordene->planta}}
                  </div>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Nº máximo de plantas</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                    {{$ordene->numero_maximo_plantas}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Amueblado</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                      @if($ordene->amueblado ==  1)
                          Sí
                      @elseif($ordene->amueblado ==  0)
                          No
                      @endif
                  </div>
					<div class="col-sm-3">
                    <h6 class="mb-0">Ascensor</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                      @if($ordene->ascensor ==  1)
                          Sí
                      @elseif($ordene->ascensor ==  0)
                          No
                      @endif
                  </div>
                </div>
                <hr>
				  <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Garaje</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                      @if($ordene->garaje ==  1)
                          Sí
                      @elseif($ordene->garaje ==  0)
                          No
                      @endif
                  </div>
					<div class="col-sm-3">
                    <h6 class="mb-0">Terraza</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                      @if($ordene->terraza ==  1)
                          Sí
                      @elseif($ordene->terraza ==  0)
                          No
                      @endif
                  </div>
                </div>
                <hr>
				  <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Patio</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                      @if($ordene->patio ==  1)
                          Sí
                      @elseif($ordene->patio ==  0)
                          No
                      @endif
                  </div>
					<div class="col-sm-3">
                    <h6 class="mb-0">Jardin</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                      @if($ordene->jardin ==  1)
                          Sí
                      @elseif($ordene->jardin ==  0)
                          No
                      @endif
                  </div>
                </div>
                <hr>
				  <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Calefacción</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                      @if($ordene->calefaccion ==  1)
                          Sí
                      @elseif($ordene->calefaccion ==  0)
                          No
                      @endif
                  </div>
					<div class="col-sm-3">
                    <h6 class="mb-0">Aire acondicionado</h6>
                  </div>
                  <div class="col-sm-2 text-secondary">
                      @if($ordene->aire_acondicionado ==  1)
                          Sí
                      @elseif($ordene->aire_acondicionado ==  0)
                          No
                      @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Piscina</h6>
                    </div>
                    <div class="col-sm-2 text-secondary">
                        @if($ordene->piscina ==  1)
                            Sí
                        @elseif($ordene->piscina ==  0)
                            No
                        @endif
                    </div>
                      <div class="col-sm-3">
                      <h6 class="mb-0">Situación</h6>
                    </div>
                    <div class="col-sm-2 text-secondary">
                        @if($ordene->situacion ==  1)
                            Sí
                        @elseif($ordene->situacion ==  0)
                            No
                        @endif
                    </div>
                  </div>
                  <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Estado de conservación</h6>
                    </div>
                    <div class="col-sm-2 text-secondary">
                        {{$ordene->estado_conservacion}}
                      </div>
                      <div class="col-sm-3">
                      <h6 class="mb-0">Acceso minusválidos</h6>
                    </div>
                    <div class="col-sm-2 text-secondary">
                        @if($ordene->acceso_minusvalido ==  1)
                            Sí
                        @elseif($ordene->acceso_minusvalido ==  0)
                            No
                        @endif
                    </div>
                  </div>
                  <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Necesidad de préstamos</h6>
                    </div>
                    <div class="col-sm-2 text-secondary">
                        @if($ordene->necesita_prestamo ==  1)
                            Sí
                        @elseif($ordene->necesita_prestamo ==  0)
                            No
                        @endif
                    </div>
                      <div class="col-sm-3">
                      <h6 class="mb-0">Observaciones</h6>
                    </div>
                    <div class="col-sm-2 text-secondary">
                        {{$ordene->observaciones}}
                      </div>
                  </div>
                  <hr>
                <a class="btn btn-secondary btn-sm mt-1" style="color: white;"
                        href="{{ route('ordenes.index') }}"><i class="fas fa-undo-alt"></i> Órdenes</a>
                <a class="btn btn-success btn-sm mt-1" style="color: white;"
                        href="{{ route('ordenes.index') }}"><i class="fas fa-database"></i> Buscar coincidencias</a>
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
                <form id="formDelete" action="{{ route('ordenes.destroy', $ordene->id) }}"
                    data-action="{{ route('ordenes.destroy',  $ordene->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
      </div>
</x-app-layout>
