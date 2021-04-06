<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('propietarios.index') }}"  style="color: rgb(111, 111, 111);">Propietarios</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <a class="btn btn-success btn-sm mt-4" style="margin-left:2.5%;" href="{{ route('propietarios.create') }}" ><i class="fas fa-plus-circle"></i> Añadir</a><br><br>

    <div style="width:95%; margin: 0 auto;">
        <table id="propietariosTable" class="table table-striped table-bordered dt-responsive" width="100%" style="margin: 0 auto;">
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
                @foreach ($propietarios as $propietario)
                    <tr>
                        <td>{{ $propietario->id }}</td>
                        <td>{{ $propietario->name }}</td>
                        <td>{{ $propietario->surname }}</td>
                        <td>
							@if($propietario->user==null)
								Usuario inexistente
							@else
								{{ $propietario->user->surname }}, {{ $propietario->user->name }}
							@endif
						</td>
                        <td>{{ $propietario->email }}</td>
                        <td>{{ $propietario->telefono }}</td>
                        <td>{{ $propietario->dni }}</td>
                        <td>{{ $propietario->estado }}</td>
                        <td>{{ \Carbon\Carbon::parse($propietario->fecha_nacimiento)->format('d/m/Y') }}</td>
                        <td>{{ $propietario->direccion }}</td>
                        <td>{{ $propietario->ciudad }}</td>
                        <td>{{ $propietario->provincia }}</td>
                        <td>{{ $propietario->observaciones }}</td>
                        <td>{{ \Carbon\Carbon::parse($propietario->created_at)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($propietario->updated_at)->format('d/m/Y') }}</td>
                        <td>
                            <a class="btn btn-info btn-sm mt-1" style="color: white;" href="{{ route('propietarios.show', $propietario->id) }}"><i class="fas fa-info"></i></a>
                            <a class="btn btn-warning btn-sm mt-1" style="color: white;"
                                href="{{ route('propietarios.edit', $propietario->id) }}"><i class="fas fa-edit"></i></a>
                                <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">
                                    <section>
                                        <button type="button" class="btn btn-danger btn-sm mt-1" @click="isDialogOpen = true"><i class="fas fa-trash-alt"></i></button>
                                        <!-- overlay -->
                                        <div class="overflow-full" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                                            <!-- dialog -->
                                            <div class="bg-white shadow-2xl m-4 sm:m-8" x-show="isDialogOpen" @click.away="isDialogOpen = false">
                                                <div class="flex justify-between items-center border-b p-2 text-xl">
                                                    <h6 class="text-xl font-bold">Propietario: {{$propietario->name}} {{$propietario->surname}}</h6>
                                                    <button type="button" @click="isDialogOpen = false">✖</button>
                                                </div>
                                                <div class="p-2">
                                                    <!-- content -->
                                                    <h4 class="font-bold">¿Desea eliminar éste propietario?</h4>
                                                    <aside class="max-w-lg mt-4 p-4 bg-yellow-100 border border-yellow-500">
                                                        <p> - Nombre: {{$propietario->name}}, <br>
                                                            - Apellidos: {{$propietario->surname}}, <br>
                                                            - Email: {{$propietario->email}}, <br>
                                                            - DNI: {{$propietario->dni}}, <br>
                                                            - Estado: {{$propietario->estado}}, <br>
                                                        </p>
                                                        <p>⚠ Asegurate de haber seleccionado los datos correctos.</p>
                                                    </aside>
                                                    <ul class="bg-gray-100 border m-8 px-4">
                                                        <div class="modal-footer">
                                                            <form id="formDelete" action="{{ route('propietarios.destroy', $propietario->id) }}" data-action="{{ route('propietarios.destroy',  $propietario->id) }}" method="POST">
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




</x-app-layout>
<script>
    $(document).ready(function() {
        $('#propietariosTable').DataTable({
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
    $(document).ready(function() {
            console.log("ready!");
            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id') // Extract info from data-* attributes
                action = $('#formDelete').attr('data-action').slice(0, -1);
                $('#formDelete').attr('action', action + id)
                console.log(action + id)
                var modal = $(this)
                $('.modal-title').append('Eliminar propietario: ' + id)
            })
        });
</script>
