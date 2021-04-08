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
    <a href="{{ route('mispropiedades.create') }}" type="button" style=" margin: 20px 0px 0px 45px; color:black;"><img src="{{asset('images/add-file.png')}}"  alt="deletelogo"  style="float: left; " ></a><br><br>

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
                            <a href="{{ route('mispropiedades.show', $mispropiedade->id) }}"><img src="{{asset('images/information.png')}}" style="float: left;" alt="infologo"></a>
                            <a href="{{ route('mispropiedades.edit', $mispropiedade->id) }}"><img src="{{asset('images/consent.png')}}" alt="editlogo"  style="float: left; margin: 0px 0px 15px 10px;" ></a>
                            <a href="{{ route('files.index2', $mispropiedade->id) }}"><img src="{{asset('images/image.png')}}" alt="editlogo"  style="float: left; margin: 0px 0px 15px 10px;" ></a>
                            <a href="{{ route('files.create2', $mispropiedade->id) }}"><img src="{{asset('images/add.png')}}" alt="editlogo"  style="float: left; margin: 0px 0px 15px 10px;" ></a>
                                <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">
                                    <section>
                                        <button type="button" @click="isDialogOpen = true"><img src="{{asset('images/recycle-bin.png')}}" alt="deletelogo"  style="float: left; margin: 0px 0px 15px 5px;" ></button>
                                        <!-- overlay -->
                                        <div class="overflow-full" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                                            <!-- dialog -->
                                            <div class="bg-white shadow-2xl m-4 sm:m-8" x-show="isDialogOpen" @click.away="isDialogOpen = false">
                                                <div class="flex justify-between items-center border-b p-2 text-xl">
                                                    <h6 class="text-xl font-bold">Propiedad: {{$mispropiedade->direccion}}</h6>
                                                    <button type="button" @click="isDialogOpen = false">✖</button>
                                                </div>
                                                <div class="p-2">
                                                    <!-- content -->
                                                    <h4 class="font-bold">¿Desea eliminar ésta propiedad?</h4>
                                                    <aside class="max-w-lg mt-4 p-4 bg-yellow-100 border border-yellow-500">
                                                        <p> - Dirección: {{$mispropiedade->direccion}}, <br>
                                                            - Ciudad: {{$mispropiedade->ciudad}}, <br>
                                                            - Estado: {{$mispropiedade->estado}}, <br>
                                                        </p>
                                                        <p>⚠ Asegurate de haber seleccionado los datos correctos.</p>
                                                    </aside>
                                                    <ul class="bg-gray-100 border m-8 px-4">
                                                            <form id="formDelete" class="m-2 mt-3 ml-2" action="{{ route('mispropiedades.destroy', $mispropiedade->id) }}" data-action="{{ route('mispropiedades.destroy',  $mispropiedade->id) }}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit">Eliminar <img src="{{asset('images/recycle-bin.png')}}" alt="deletelogo"  style="float: left; margin: 0px 0px 15px 5px;" ></button>
                                                            </form>
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
