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
    <a class="btn btn-success btn-sm mt-4" style="margin-left:2.5%;" href="{{ route('propiedades.create') }}" ><i class="fas fa-plus-circle"></i> Añadir</a><br><br>

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
                            <a class="btn btn-info btn-sm mt-1" style="color: white;" href="{{ route('propiedades.show', $propiedade->id) }}"><i class="fas fa-info"></i></a>
                            <a class="btn btn-warning btn-sm mt-1" style="color: white;"
                                href="{{ route('propiedades.edit', $propiedade->id) }}"><i class="fas fa-edit"></i></a>
                                <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">
                                    <section>
                                        <button type="button" class="btn btn-danger btn-sm mt-1" @click="isDialogOpen = true"><i class="fas fa-trash-alt"></i></button>
                                        <!-- overlay -->
                                        <div class="overflow-full" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                                            <!-- dialog -->
                                            <div class="bg-white shadow-2xl m-4 sm:m-8" x-show="isDialogOpen" @click.away="isDialogOpen = false">
                                                <div class="flex justify-between items-center border-b p-2 text-xl">
                                                    <h6 class="text-xl font-bold">Propiedad: {{$propiedade->direccion}}</h6>
                                                    <button type="button" @click="isDialogOpen = false">✖</button>
                                                </div>
                                                <div class="p-2">
                                                    <!-- content -->
                                                    <h4 class="font-bold">¿Desea eliminar ésta propiedad?</h4>
                                                    <aside class="max-w-lg mt-4 p-4 bg-yellow-100 border border-yellow-500">
                                                        <p> - Dirección: {{$propiedade->direccion}}, <br>
                                                            - Ciudad: {{$propiedade->ciudad}}, <br>
                                                            - Estado: {{$propiedade->estado}}, <br>
                                                        </p>
                                                        <p>⚠ Asegurate de haber seleccionado los datos correctos.</p>
                                                    </aside>
                                                    <ul class="bg-gray-100 border m-8 px-4">
                                                        <div class="modal-footer">
                                                            <form id="formDelete" action="{{ route('propiedades.destroy', $propiedade->id) }}" data-action="{{ route('propiedades.destroy',  $propiedade->id) }}" method="POST">
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
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div><br>


    @if ($propiedades->isEmpty())

    @elseif (!$propiedades->isEmpty())
    @foreach ($propiedades as $propiedade)
    <div id="{{$propiedade->id}}" class="modal" style="width:300px; margin-top:15%; margin-left:39%;  margin-right:39%;">
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
                <form id="formDelete" action="{{ route('propiedades.destroy', $propiedade->id) }}"
                    data-action="{{ route('propiedades.destroy',  $propiedade->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </div>
        </div>
      </div>
    @endforeach
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
