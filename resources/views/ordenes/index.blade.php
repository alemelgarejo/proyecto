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
    <a class="btn btn-success btn-sm mt-4" style="margin-left:2.5%;" href="{{ route('ordenes.create') }}" ><i class="fas fa-plus-circle"></i> Añadir</a><br><br>

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
                            <a class="btn btn-info btn-sm mt-1" style="color: white;" href="{{ route('ordenes.show', $ordene->id) }}"><i class="fas fa-info"></i></a>
                            <a class="btn btn-warning btn-sm mt-1" style="color: white;"
                                href="{{ route('ordenes.edit', $ordene->id) }}"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger btn-sm mt-1" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-trash-alt"></i></button>
                            <a class="btn btn-success btn-sm mt-1" href="{{ route('ordenes.show', $ordene->id) }}"><i class="fas fa-database"></i></a>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div><br>


    @if ($ordenes->isEmpty())

    @elseif (!$ordenes->isEmpty())
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
                <form id="formDelete" action="{{ route('ordenes.destroy', $ordene->id) }}"
                    data-action="{{ route('ordenes.destroy',  $ordene->id) }}" method="POST">
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
