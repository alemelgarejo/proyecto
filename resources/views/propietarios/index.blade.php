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
    <a class="btn btn-secondary btn-sm ml-5 mt-3" href="{{ route('propietarios.create') }}" type="button">Crear&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a><br><br>

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
                        <td>{{ \Carbon\Carbon::parse($propietario->updated_at)->format('d/m/Y') }}</td>
                        <td>
                            <a data-toggle="tooltip" data-placement="top" title="Ver" href="{{ route('propietarios.show', $propietario->id) }}" style="color: gray;"><i class="fas fa-info-circle"></i></a>&nbsp;
                            <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('propietarios.edit', $propietario->id) }}" style="color: gray;"><i class="fas fa-edit"></i></a>&nbsp;
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
