<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('users.index') }}"  style="color: rgb(111, 111, 111);">Usuarios</a>
        </h2>
    </x-slot>
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <br>

    <div style="width:95%; margin: 0 auto;">
        <table id="usersTable" class="table table-striped table-bordered dt-responsive" width="100%" style="margin: 0 auto;">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Email</td>
                    <td>Teléfono</td>
                    <td>Comercial</td>
                    <td>DNI</td>
                    <td>Fecha de nacimiento</td>
                    <td>Rol</td>
                    <td>Estado</td>
                    <td>Creado</td>
                    <td>Actualizado</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telefono }}</td>
                        <td>{{ $user->comercial }}</td>
                        <td>{{ $user->dni }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->fecha_nacimiento)->format('d/m/Y') }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->estado }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') }}</td>
                        <td>
                            <a class="btn btn-info btn-sm mt-1" style="color: white;" href="{{ route('users.show', $user->id) }}"><i class="fas fa-info"></i></a>
                            <a class="btn btn-warning btn-sm mt-1" style="color: white;"
                                href="{{ route('users.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
                            <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">
                                <section>
                                    <button type="button" class="btn btn-danger btn-sm mt-1" @click="isDialogOpen = true"><i class="fas fa-trash-alt"></i></button>
                                    <!-- overlay -->
                                    <div class="overflow-full" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                                        <!-- dialog -->
                                        <div class="bg-white shadow-2xl m-4 sm:m-8" x-show="isDialogOpen" @click.away="isDialogOpen = false">
                                            <div class="flex justify-between items-center border-b p-2 text-xl">
                                                <h6 class="text-xl font-bold">Usuario: {{$user->name}} {{$user->surname}}</h6>
                                                <button type="button" @click="isDialogOpen = false">✖</button>
                                            </div>
                                            <div class="p-2">
                                                <!-- content -->
                                                <h4 class="font-bold">¿Desea eliminar éste usuario?</h4>
                                                <aside class="max-w-lg mt-4 p-4 bg-yellow-100 border border-yellow-500">
                                                    <p> - Nombre: {{$user->name}}, <br>
                                                        - Apellidos: {{$user->surname}}, <br>
                                                        - Email: {{$user->email}}, <br>
                                                        - DNI: {{$user->dni}}, <br>
                                                        - Estado: {{$user->estado}}, <br>
                                                        - Rol: {{$user->role->name}}, <br>
                                                    </p>
                                                    <p>⚠ Asegurate de haber seleccionado los datos correctos.</p>
                                                </aside>
                                                <ul class="bg-gray-100 border m-8 px-4">
                                                    <div class="modal-footer">
                                                        <form id="formDelete" action="{{ route('users.destroy', $user->id) }}" data-action="{{ route('users.destroy',  $user->id) }}" method="POST">
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
        $('#usersTable').DataTable({
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
            },"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    if ( aData[9] == "Activo" )
                    {
                        $('td', nRow).css('background-color', '#c5f7d1');
                    }
                    else if ( aData[9] == "Inactivo" )
                    {
                        $('td', nRow).css('background-color', '#f7f9c0');
                    }
                },
        });
    });

</script>
