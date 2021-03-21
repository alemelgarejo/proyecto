<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('misclientes.index') }}"  style="color: rgb(111, 111, 111);">Mis clientes</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <a class="btn btn-outline-secondary btn-sm mt-4" style="margin-left:2.5%;" href="{{ route('misclientes.create') }}" >Crear cliente</a><br><br>

    <div style="width:95%; margin: 0 auto;">
        <table id="clientesTable" class="table table-striped table-bordered dt-responsive" width="100%" style="margin: 0 auto;">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Encargado</td>
                    <td>Email</td>
                    <td>Teléfono</td>
                    <td>DNI</td>
                    <td>Estado</td>
                    <td>Fecha de nacimiento</td>
                    <td>Dirección</td>
                    <td>Ciudad</td>
                    <td>Provincia</td>
                    <td>Observaciones</td>
                    <td>Creado</td>
                    <td>Actualizado</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($misclientes as $miscliente)
                    <tr id="miscliente">
                        <td>{{ $miscliente->id }}</td>
                        <td>{{ $miscliente->name }}</td>
                        <td>{{ $miscliente->surname }}</td>
                        <td>
							@if($miscliente->user==null)
								Usuario inexistente
							@else
								{{$miscliente->user->surname}}, {{ $miscliente->user->name }}
							@endif
						</td>
                        <td>{{ $miscliente->email }}</td>
                        <td>{{ $miscliente->telefono }}</td>
                        <td>{{ $miscliente->dni }}</td>
                        <td>{{ $miscliente->estado }}</td>
                        <td>{{ \Carbon\Carbon::parse($miscliente->fecha_nacimiento)->format('d/m/Y') }}</td>
                        <td>{{ $miscliente->direccion }}</td>
                        <td>{{ $miscliente->ciudad }}</td>
                        <td>{{ $miscliente->provincia }}</td>
                        <td>{{ $miscliente->observaciones }}</td>
                        <td>{{ \Carbon\Carbon::parse($miscliente->created_at)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($miscliente->update_at)->format('d/m/Y') }}</td>
                        <td>
                            <a class="btn btn-info btn-sm mt-1" style="color: white;" href="{{ route('misclientes.show', $miscliente->id) }}"><i class="fas fa-info"></i></a>
                            <a class="btn btn-warning btn-sm mt-1" style="color: white;"
                                href="{{ route('misclientes.edit', $miscliente->id) }}"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger btn-sm mt-1" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div><br>

    @if ($misclientes->isEmpty())

    @elseif (!$misclientes->isEmpty())
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
                <button type="button" class="btn btn-secondary" onclick="document.getElementById('id01').style.display='none'"  data-dismiss="modal">Close</button>
                <form id="formDelete" action="{{ route('misclientes.destroy', $miscliente->id) }}"
                    data-action="{{ route('misclientes.destroy',  $miscliente->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </div>
        </div>
      </div>
      @endif




</x-app-layout>

<script>
    $(document).ready(function() {
        $('#clientesTable').DataTable({
            responsive: true,
            "pagingType": "simple_numbers",
            "language": {
                "lengthMenu": "Mostrar _MENU_ por página",
                "zeroRecords": "Sin coincidencias - Disculpe",
                "info": "Mostrando _PAGE_ de _PAGES_ páginas",
                "infoEmpty": "No disponible",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                'search': 'Buscar:',
                'paginate' : {
                    'next': 'Siguiente',
                    'previous': 'Anterior'
                }
            },
			"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    if ( aData[7] == "Activo" )
                    {
                        $('td', nRow).css('background-color', '#c5f7d1');
                    }
                    else if ( aData[7] == "Inactivo" )
                    {
                        $('td', nRow).css('background-color', '#f7f9c0');
                    }
                },
        });

    });

</script>
