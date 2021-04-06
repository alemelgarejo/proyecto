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
    <a class="btn btn-success btn-sm mt-4" style="margin-left:2.5%;" href="{{ route('clientes.create') }}" ><i class="fas fa-plus-circle"></i> Añadir</a><br><br>

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
                    <td>Creado</td>
                    <td>Actualizado</td>
                    <td>Acciones</td>
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
                        <td>{{ \Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($cliente->update_at)->format('d/m/Y') }}</td>
                        <td>
                            <a class="btn btn-info btn-sm mt-1" style="color: white;" href="{{ route('clientes.show', $cliente->id) }}"><i class="fas fa-info"></i></a>
                            <a class="btn btn-warning btn-sm mt-1" style="color: white;"
                                href="{{ route('clientes.edit', $cliente->id) }}"><i class="fas fa-edit"></i></a>
							<a class="btn btn-success btn-sm mt-1" href="{{ route('ordenes.create') }}"><i class="fas fa-sort"></i></a>
                            <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">
                                <section>
                                    <button type="button" class="btn btn-danger btn-sm mt-1" @click="isDialogOpen = true"><i class="fas fa-trash-alt"></i></button>
                                    <!-- overlay -->
                                    <div class="overflow-full" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                                        <!-- dialog -->
                                        <div class="bg-white shadow-2xl m-4 sm:m-8" x-show="isDialogOpen" @click.away="isDialogOpen = false">
                                            <div class="flex justify-between items-center border-b p-2 text-xl">
                                                <h6 class="text-xl font-bold">Cliente: {{$cliente->name}}, {{$cliente->surname}}</h6>
                                                <button type="button" @click="isDialogOpen = false">✖</button>
                                            </div>
                                            <div class="p-2">
                                                <!-- content -->
                                                <h4 class="font-bold">¿Desea eliminar éste cliente?</h4>
                                                <aside class="max-w-lg mt-4 p-4 bg-yellow-100 border border-yellow-500">
                                                    <p> - Nombre: {{$cliente->name}}, <br>
                                                        - Apellidos: {{$cliente->surname}}, <br>
                                                        - Email: {{$cliente->email}}, <br>
                                                        - DNI: {{$cliente->dni}}, <br>
                                                        - Estado: {{$cliente->estado}}, <br>
                                                    </p>
                                                    <p>⚠ Asegurate de haber seleccionado los datos correctos.</p>
                                                </aside>
                                                <ul class="bg-gray-100 border m-8 px-4">
                                                    <div class="modal-footer">
                                                        <form id="formDelete" action="{{ route('clientes.destroy', $cliente->id) }}" data-action="{{ route('clientes.destroy',  $cliente->id) }}" method="POST">
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
