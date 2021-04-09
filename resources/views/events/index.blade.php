<script>
    var url_="{{url('/dashboard/events')}}";
    var url_show="{{url('/dashboard/events/show')}}";
</script>

<style>
    #calendar {
        max-width: 900px;
        margin: 40px auto;
    }
</style>


<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('events.index') }}"  style="color: rgb(111, 111, 111);">Agenda</a>
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10"><div id='calendar'></div></div>
            <div class="col"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myCalendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Datos del evento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <input type="text" name="txtID" id="txtID" hidden>
                <label for="txtFecha">Fecha: </label>
                <input type="text" readonly class="form-control" name="txtFecha" id="txtFecha">
                <br>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="txtTitulo">Título: </label>
                        <input type="text" class="form-control" name="txtTitulo" id="txtTitulo">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtHora">Hora: </label>
                        <input type="time" class="form-control" name="txtHora" id="txtHora">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="txtDescription">Descripción: </label>
                        <textarea name="txtDescription" class="form-control" id="txtDescription" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="txtColor">Color: </label>
                        <input type="color" class="form-control" name="txtColor" id="txtColor">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="btnAgregar">Añadir</button>
                <button class="btn btn-primary" id="btnModificar">Actualizar</button>
                <button class="btn btn-danger" id="btnEliminar">Eliminar</button>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
