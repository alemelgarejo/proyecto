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
    <a class="btn btn-outline-secondary btn-sm mt-4" style="margin-left:2.5%;" href="{{ route('users.create') }}" >Crear usuario</a><br><br>

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
                            <a class="btn btn-info btn-sm mt-1" style="color: white;" href="{{ route('users.show', $user->id) }}">Ver</a>
                            <a class="btn btn-warning btn-sm mt-1" style="color: white;"
                                href="{{ route('users.edit', $user->id) }}">Editar</a>
                                <form id="formDelete" action="{{ route('users.destroy', $user->id) }}"
                                    data-action="{{ route('users.destroy',  $user->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm mt-1">Borrar</button>
                                </form>
                            <!--<button class="btn btn-danger btn-sm mt-1" style="color: white;" type="button"
                                data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id }}">
                                Borrar
                            </button>-->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div><br>

    @if ($users->isEmpty())

    @elseif (!$users->isEmpty())
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar el registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form id="formDelete" action="{{ route('users.destroy', 0) }}"
                        data-action="{{ route('users.destroy', 0) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
	

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
                'search': 'Buscar:',
                'paginate' : {
                    'next': 'Siguiente',
                    'previous': 'Anterior'
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
                $('.modal-title').append('Eliminar usuario: ' + id)
            })
        });
</script>