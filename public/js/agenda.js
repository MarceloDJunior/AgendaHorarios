$(document).ready(function() {

    var domain = location.protocol + '//' + location.host;

    $('#agenda').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },
        timezone: 'America/Sao_Paulo',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        axisFormat:'H:mm',
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],

        timeFormat: 'HH:mm',
        buttonText: {
            today:"Hoje",
            month:"Mês",
            week:"Semana",
            day:"Dia",
            list: "Lista"
        },
        events: {
            url: domain+'/agendamentos/getAgendamentos',
            error: function() {
                //$('#script-warning').show();
            }
        },
        /*loading: function(bool) {
            $('#loading').toggle(bool);
        }*/
    });

});
