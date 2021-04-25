<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('propiedades.index') }}"  style="color: rgb(111, 111, 111);">Propiedades</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>

    @endif
    <a class="btn btn-secondary btn-sm ml-5 mt-3" href="{{ route('propiedades.create') }}" type="button">Crear&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a><br><br>

    <div style="width:95%; margin: 0 auto;">
        <table id="propiedadesTable" class="table table-striped table-bordered dt-responsive" width="100%" style="margin: 0 auto;">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Propietario</td>
                    <td>Estado</td>
                    <td>Valoración</td>
                    <td>Tipo</td>
                    <td>Dirección</td>
                    <td>Ciudad</td>
                    <td>Provincia</td>
                    <td>Superficie (m<sup>2</sup>)</td>
                    <td>Google Maps</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($propiedades as $propiedade)
                    <tr>
                        <td>{{ $propiedade->id }}</td>
                        <td>@if($propiedade->propietario==null)
								Propietario inexistente
							@else
								{{ $propiedade->propietario->surname }}, {{ $propiedade->propietario->name }}
							@endif
						</td>
                        <td>{{ $propiedade->estado }}</td>
                        <td>{{ $propiedade->valoracion }}</td>
                        <td>{{ $propiedade->tipo }}</td>
                        <td>{{ $propiedade->direccion }}</td>
                        <td>{{ $propiedade->ciudad }}</td>
                        <td>{{ $propiedade->provincia }}</td>
                        <td>{{ $propiedade->superficie }}</td>
                        <td style="text-align: center;"><a target="_blank" href="{{$propiedade->google_maps}}"><i class="fas fa-map-marked-alt"></i></a></td>
                        <td>
                            <a data-toggle="tooltip" data-placement="top" title="Ver" href="{{ route('propiedades.show', $propiedade->id) }}" style="color: gray;"><i class="fas fa-info-circle"></i></a>&nbsp;
                            <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('propiedades.edit', $propiedade->id) }}" style="color: gray;"><i class="fas fa-edit"></i></a>&nbsp;
                            <a data-toggle="tooltip" data-placement="top" title="Ver imágenes" href="{{ route('files.index2', $propiedade->id) }}" style="color: gray;"><i class="fas fa-images"></i></a>&nbsp;
                            <a data-toggle="tooltip" data-placement="top" title="Añadir imágenes" href="{{route('files.create2', $propiedade->id)}}" style="color: gray;"><i class="fas fa-image"></i></a>
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
        $('#propiedadesTable').DataTable({
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
