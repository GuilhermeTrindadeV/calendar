(function(win, doc) {
    'use strict';

    let calendarEl = doc.querySelector('.calendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar:
            {
                start: 'title', 
                center: 'timeGridWeek, timeGridDay, dayGridMonth',
                end: 'today prev,next'
            },
            locale: 'pt-br',
            buttonText: {
                today:  'hoje',
                month:  'mês',
                week:   'semana',
                day:    'dia',
            },
            events: route,
            eventClick: function(info) {
                const myModal = new bootstrap.Modal('#visualizar', {
                    keyboard: false
                });
                const modalToggle = document.getElementById('visualizar'); 
                myModal.show(modalToggle)

                $('#visualizar #title').text(info.event.title);
                $('#visualizar #title').val(info.event.title);

                $('#visualizar #description').text(info.event.extendedProps.description);
                $('#visualizar #description').val(info.event.extendedProps.description);

                $('#visualizar #start').text(info.event.start.toLocaleString('pt-BR'));
                $('#visualizar #start').val(info.event.start.toLocaleString('pt-BR'));

                $('#visualizar #end').text(info.event.end.toLocaleString('pt-BR'));
                $('#visualizar #end').val(info.event.end.toLocaleString('pt-BR'));
            },
            eventRender: function (event, element, view) {
                element.find('#title').append('<div class="hr-line-solid-no-margin"></div><span style="font-size: 10px">' + event.description + '</span></div>');
            },
            dateClick: function(info) {
                const myModal = new bootstrap.Modal('#saveEvent', {
                keyboard: false
                });
                
                const modalToggle = document.getElementById('saveEvent'); 
                myModal.show(modalToggle);
            },
            selectable: true,
            select: function(info) {
                $('#saveEvent #start').val(info.start.toLocaleString('pt-BR'));
                $('#saveEvent #end').val(info.end.toLocaleString('pt-BR'));
            }
            });
            calendar.render();

})(window, document);

$(document).ready(function() {
    $("#cadEvent").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            method: "POST",
            url: salvar,
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if(response) {
                    if(response['sit']) {
                        location.reload();
                    }else {
                        $("#msg-cad").html(response['msg']);
                    }
                }
            }
        });
    });

    $('#cancModal').on("click", function() {
        $('.viewEvent').slideToggle();
        $('.formEdit').slideToggle();
    });

    $('#cancEdit').on("click", function() {
        $('.formEdit').slideToggle();
        $('.viewEvent').slideToggle();
    });

    $("#editEvent").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            method: "POST",
            url: edit,
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if(response) {
                    if(response['sit']) {
                        location.reload();
                    }else {
                        $("#msg-edit").html(response['msg']);
                    }
                }
            }
        });
    });
});

function DataHora(evento, objeto){
    var keypress = (window.event) ? event.keyCode : evento.which;
    campo = eval(objeto);
    if(campo.value == '00/00/0000 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;
    if ((caracteres.search(String.fromCharCode (keypress)) != -1) && campo.value.length < (19)) {
        if(campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if(campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if(campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if(campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if(campo.value.length == conjunto5)
            campo.value = campo.value + separacao4;
    } else {
        event.returnValue = false;
    }
}