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
    <a class="btn btn-secondary btn-sm ml-5 mt-3" href="{{ route('misclientes.create') }}" type="button">Crear&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a><br><br>
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
                        <td>{{ \Carbon\Carbon::parse($miscliente->update_at)->format('d/m/Y') }}</td>
                        <td>
                            <a data-toggle="tooltip" data-placement="top" title="Ver" href="{{route('misclientes.show', $miscliente->id)}}" style="color: gray;"><i class="fas fa-info-circle"></i></a>&nbsp;
                            <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('misclientes.edit', $miscliente->id) }}" style="color: gray;"><i class="fas fa-edit"></i></a>&nbsp;
                            <a data-toggle="tooltip" data-placement="top" title="Crear Órden" href="{{route('ordenes.create') }}" style="color: gray"><i class="fas fa-folder-plus"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div><br>

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
                'search': "<i class='fas fa-search'></i>",
                'paginate' : {
                    'next': '<i class="fas fa-chevron-right"></i>',
                    'previous': '<i class="fas fa-chevron-left"></i>'
                },
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
