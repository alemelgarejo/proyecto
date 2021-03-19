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
    <a class="btn btn-outline-secondary btn-sm mt-4" style="margin-left:2.5%;" href="{{ route('clientes.create') }}" >Crear cliente</a><br><br>

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
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->name }}</td>
                        <td>{{ $cliente->surname }}</td>
                        <td>{{$cliente->user->surname}}, {{ $cliente->user->name }}</td>
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
                            <a class="btn btn-info btn-sm mt-1" style="color: white;" href="{{ route('clientes.show', $cliente->id) }}">Ver</a>
                            <a class="btn btn-warning btn-sm mt-1" style="color: white;"
                                href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                            <button id="myBtn" class="btn btn-danger btn-sm mt-1" style="color: white;" type="button"
                                data-toggle="modal" data-target="#deleteModal" data-id="{{$cliente->id}}" >
                                Borrar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div><br>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        
        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        
        /* Modal Content */
        .modal-content {
          background-color: #fefefe;
          margin: auto;
          padding: 20px;
          border: 1px solid #888;
          width: 40%;
        }
        
        /* The Close Button */
        .close {
          color: #aaaaaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        }
        </style>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
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
        <form id="formDelete" action="{{ route('clientes.destroy', $cliente->id) }}"
            data-action="{{ route('clientes.destroy',  $cliente->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0, 1];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


    @if ($clientes->isEmpty())

    @elseif (!$clientes->isEmpty())
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form id="formDelete" action="{{ route('clientes.destroy', $cliente->id) }}"
                        data-action="{{ route('clientes.destroy',  $cliente->id) }}" method="POST">
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
        $('#clientesTable').DataTable({
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
                $('.modal-title').append('Eliminar cliente: ' + id)
            })
        });
</script>