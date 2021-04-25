<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('clientes.index') }}"  style="color: rgb(111, 111, 111);">Clientes</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <a class="btn btn-secondary btn-sm ml-5 mt-3" href="{{ route('clientes.create') }}" type="button">Crear&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a><br><br>

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
                    <td style="float:left;">Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr id="cliente">
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->name }}</td>
                        <td>{{ $cliente->surname }}</td>
                        <td>
							@if($cliente->user==null)
								Usuario inexistente
							@else
								{{$cliente->user->surname}}, {{ $cliente->user->name }}
							@endif
						</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->dni }}</td>
                        <td>{{ $cliente->estado }}</td>
                        <td>{{ \Carbon\Carbon::parse($cliente->fecha_nacimiento)->format('d/m/Y') }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>{{ $cliente->ciudad }}</td>
                        <td>{{ $cliente->provincia }}</td>
                        <td>{{ $cliente->observaciones }}</td>
                        <td>{{ \Carbon\Carbon::parse($cliente->update_at)->format('d/m/Y') }}</td>
                        <td >
                            <a data-toggle="tooltip" data-placement="top" title="Ver" href="{{ route('clientes.show', $cliente->id) }}" style="color: gray;"><i class="fas fa-info-circle"></i></a>&nbsp;
                            <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('clientes.edit', $cliente->id) }}" style="color: gray;"><i class="fas fa-edit"></i></a>&nbsp;
                            <a data-toggle="tooltip" data-placement="top" title="Crear Órden" href="{{ route('ordenes.create', $cliente->id) }}" style="color: gray"><i class="fas fa-folder-plus"></i></a>

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
