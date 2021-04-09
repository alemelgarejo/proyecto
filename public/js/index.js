document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'dayGrid', 'interaction', 'timeGrid', 'list' ],

        header:{
            left:'prev,next today Miboton',
            center:'title',
            right:'dayGridMonth'/* ,timeGridWeek,timeGridDay */
        },

        customButtons: {
            /* Miboton:{
                text:'Botón',
                click:function(){
                    $('#myCalendar').modal('toggle');
                },
            } */
        },

        dateClick: function(info){
            limpiarFormulario();
            $('#txtFecha').val(info.dateStr);
            $("#btnAgregar").prop('disabled', false);
            $("#btnEliminar").prop('disabled', true);
            $("#btnModificar").prop('disabled', true);
            $('#myCalendar').modal('toggle');
            //calendar.addEvent({title: 'Evento x', date:info.dateStr})
        },

        eventClick: function(info){
            $("#btnAgregar").prop('disabled', true);
            $("#btnEliminar").prop('disabled', false);
            $("#btnModificar").prop('disabled', false);
            //console.log(info.event.title, info.event.start, info.event.end, info.event.textColor, info.event.backgroundColor, info.event.extendedProps.description);
            $('#txtID').val(info.event.id);
            $('#txtTitulo').val(info.event.title);
            $('#txtColor').val(info.event.backgroundColor);
            mes = (info.event.start.getMonth()+1);
            dia = (info.event.start.getDate());
            year = (info.event.start.getFullYear());
            mes = (mes<10)?"0"+mes:mes;
            dia = (dia<10)?"0"+dia:dia;
            $('#txtFecha').val(year+'-'+mes+'-'+dia);
            //$('#txtFecha').val(dia+'-'+mes+'-'+year);
            hora = info.event.start.getHours();
            minutos = info.event.start.getMinutes();
            hora = (hora<10)?"0"+hora:hora;
            minutos = (minutos<10)?"0"+minutos:minutos;
            time = (hora+':'+minutos);
            $('#txtHora').val(time);
            $('#txtDescription').val(info.event.extendedProps.description);
            $('#myCalendar').modal('toggle');

        },
        events:url_show,

    });

    calendar.setOption('locale', 'Es')
    calendar.render();

    $('#btnAgregar').click(function() {
        objEvento = recolectarDatosGUI('POST');
        EnviarInformacion('', objEvento);
    });

    $('#btnModificar').click(function() {
        objEvento = recolectarDatosGUI('PATCH');
        EnviarInformacion('/'+$('#txtID').val(), objEvento);
    });

    $('#btnEliminar').click(function() {
        objEvento = recolectarDatosGUI('DELETE');
        EnviarInformacion('/'+$('#txtID').val(), objEvento);
    });

    function recolectarDatosGUI(method) {
        nuevoEvento={
            user_id: '',
            title: $('#txtTitulo').val(),
            description: $('#txtDescription').val(),
            color: $('#txtColor').val(),
            textColor: 'white',
            start: $('#txtFecha').val()+' '+$('#txtHora').val() ,
            end: $('#txtFecha').val()+' '+$('#txtHora').val(),
            '_token':$("meta[name='csrf-token']").attr('content'),
            '_method': method,
        }
        return (nuevoEvento);
    };

    function EnviarInformacion(accion, objEvento) {
        $.ajax(
            {
                type:'POST',
                url:url_+accion,
                data:objEvento,
                success:function(msg) {
                    console.log(msg);
                    $('#myCalendar').modal('toggle');
                    calendar.refetchEvents();
                    },
                error:function(){alert('Hay un error');},
            }
        )
    };

    function limpiarFormulario() {
        $('#txtID').val('');
        $('#txtTitulo').val('');
        $('#txtColor').val('');
        $('#txtFecha').val('');
        $('#txtHora').val('08:00');
        $('#txtDescription').val('');
    };

});
