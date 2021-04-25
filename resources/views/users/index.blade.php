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
                            <a data-toggle="tooltip" data-placement="top" title="Ver" href="{{ route('users.show', $user->id) }}" style="color: gray;"><i class="fas fa-info-circle"></i></a>&nbsp;
                            <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('users.edit', $user->id) }}" style="color: gray;"><i class="fas fa-edit"></i></a>&nbsp;
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
