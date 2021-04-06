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
                            <a class="btn btn-warning btn-sm mt-1" style="color: white;" href="{{ route('ordenes.edit', $ordene->id) }}"><i class="fas fa-edit"></i></a>
                            <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">
                                <section>
                                    <button type="button" class="btn btn-danger btn-sm mt-1" @click="isDialogOpen = true"><i class="fas fa-trash-alt"></i></button>
                                    <!-- overlay -->
                                    <div class="overflow-full" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                                        <!-- dialog -->
                                        <div class="bg-white shadow-2xl m-4 sm:m-8" x-show="isDialogOpen" @click.away="isDialogOpen = false">
                                            <div class="flex justify-between items-center border-b p-2 text-xl">
                                                <h6 class="text-xl font-bold">Órden</h6>
                                                <button type="button" @click="isDialogOpen = false">✖</button>
                                            </div>
                                            <div class="p-2">
                                                <!-- content -->
                                                <h4 class="font-bold">¿Desea eliminar ésta órden?</h4>
                                                <aside class="max-w-lg mt-4 p-4 bg-yellow-100 border border-yellow-500">
                                                    <p> - Cliente: {{$ordene->cliente->name}} {{$ordene->cliente->surname}}, <br>
                                                        - Fecha: {{\Carbon\Carbon::parse($ordene->fecha)->format('d/m/Y')}}, <br>
                                                    </p>
                                                    <p>⚠ Asegurate de haber seleccionado los datos correctos.</p>
                                                </aside>
                                                <ul class="bg-gray-100 border m-8 px-4">
                                                    <div class="modal-footer">
                                                        <form id="formDelete" action="{{ route('ordenes.destroy', $ordene->id) }}" data-action="{{ route('ordenes.destroy',  $ordene->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm">Borrar <i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </ul>
                                            </div>
                                        </div><!-- /dialog -->
                                    </div><!-- /overlay -->
                                </section>
                            </main>
                            <a class="btn btn-success btn-sm mt-1" href="{{ route('ordenes.show', $ordene->id) }}"><i class="fas fa-database"></i></a>
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
