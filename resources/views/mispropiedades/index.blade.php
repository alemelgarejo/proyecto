<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('mispropiedades.index') }}"  style="color: rgb(111, 111, 111);">Mis propiedades</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>

    @endif
    <a class="btn btn-success btn-sm mt-4" style="margin-left:2.5%;" href="{{ route('mispropiedades.create') }}" ><i class="fas fa-plus-circle"></i> Añadir</a><br><br>

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
                @foreach ($mispropiedades as $mispropiedade)
                    <tr>
                        <td>{{ $mispropiedade->id }}</td>
                        <td>@if($mispropiedade->propietario==null)
								Propietario inexistente
							@else
								{{ $mispropiedade->propietario->surname }}, {{ $mispropiedade->propietario->name }}
							@endif
						</td>
                        <td>{{ $mispropiedade->estado }}</td>
                        <td>{{ $mispropiedade->valoracion }}</td>
                        <td>{{ $mispropiedade->tipo }}</td>
                        <td>{{ $mispropiedade->direccion }}</td>
                        <td>{{ $mispropiedade->ciudad }}</td>
                        <td>{{ $mispropiedade->provincia }}</td>
                        <td>{{ $mispropiedade->superficie }}</td>
                        <td style="text-align: center;"><a target="_blank" href="{{$mispropiedade->google_maps}}"><i class="fas fa-map-marked-alt"></i></a></td>
                        <td>
                            <a class="btn btn-info btn-sm mt-1" style="color: white;" href="{{ route('mispropiedades.show', $mispropiedade->id) }}"><i class="fas fa-info"></i></a>
                            <a class="btn btn-warning btn-sm mt-1" style="color: white;"
                                href="{{ route('mispropiedades.edit', $mispropiedade->id) }}"><i class="fas fa-edit"></i></a>

                                <button class="btn btn-danger btn-sm mt-1" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-trash-alt"></i></button>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div><br>


    @if ($mispropiedades->isEmpty())

    @elseif (!$mispropiedades->isEmpty())
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
                <form id="formDelete" action="{{ route('mispropiedades.destroy', $mispropiedade->id) }}"
                    data-action="{{ route('mispropiedades.destroy',  $mispropiedade->id) }}" method="POST">
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
