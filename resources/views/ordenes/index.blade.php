<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('ordenes.index') }}"  style="color: rgb(111, 111, 111);">Órdenes</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>

    @endif
    <a class="btn btn-secondary btn-sm mt-3 ml-5"href="{{ route('ordenes.create') }}" >Crear&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a><br><br>

    <div style="width:95%; margin: 0 auto;">
        <table id="ordenesTable" class="table table-striped table-bordered dt-responsive" width="100%" style="margin: 0 auto;">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Cliente</td>
                    <td>Fecha</td>
                    <td>Ciudad</td>
                    <td>Tipo de órden</td>
                    <td>Tipo de propiedad</td>
                    <td>Precio mínimo</td>
                    <td>Precio máximo</td>
                    <td>Superficie mínima</td>
                    <td>Dormitorios máximo</td>
                    <td>Amueblado</td>
                    <td>Situación</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $ordene)
                    <tr>
                        <td>{{ $ordene->id }}</td>
                        <td>@if($ordene->cliente==null)
								Cliente inexistente
							@elseif ($ordene->cliente)
								{{ $ordene->cliente->surname }}, {{ $ordene->cliente->name }}
							@endif
						</td>
                        <td>{{ \Carbon\Carbon::parse($ordene->fecha)->format('d/m/Y') }}</td>
                        <td>{{ $ordene->ciudad }}</td>
                        <td>{{ $ordene->tipo_orden }}</td>
                        <td>{{ $ordene->tipo_propiedad }}</td>
                        <td>{{ $ordene->precio_minimo }}</td>
                        <td>{{ $ordene->precio_maximo }}</td>
                        <td>{{ $ordene->superficie_minima }}</td>
                        <td>{{ $ordene->dormitorios_maximo }}</td>
                        <td>
                            @if($ordene->amueblado == 0)
                                No
                            @elseif($ordene->amueblado == 1)
                                Sí
                            @endif
                        </td>
                        <td>{{ $ordene->situación }}</td>
                        <td>
                            <a data-toggle="tooltip" data-placement="top" title="Ver" href="{{ route('ordenes.show', $ordene->id) }}" style="color: gray;"><i class="fas fa-info-circle"></i></a>&nbsp;
                            <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('ordenes.edit', $ordene->id) }}" style="color: gray;"><i class="fas fa-edit"></i></a>&nbsp;
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
        $('#ordenesTable').DataTable({
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
                    if ( aData[2] == "Activo" )
                    {
                        $('td', nRow).css('background-color', '#c5f7d1');
                    }
                    else if ( aData[2] == "Inactivo" )
                    {
                        $('td', nRow).css('background-color', '#f7f9c0');
                    }
					else if ( aData[2] == "Vendida" )
                    {
                        $('td', nRow).css('background-color', '#ffbcbc');
                    }
                },
        });
    });
</script>
