// Executar quando o documento HTML for completamente carregado
document.addEventListener('DOMContentLoaded', function () {
    // Tentar obter o elemento do calendário
    var calendarEl = document.getElementById('calendar');

    // Verificar se o elemento do calendário foi encontrado
    if (calendarEl) {
        // Instanciar FullCalendar e atribuir a variável calendar
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            // Definir a data inicial
            // initialDate: '2024-03-01',
            locale: 'pt-br',
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: '../api/listar_evento.php',
            eventClick: function (info) {
                document.getElementById("myModal").style.display = "block";
                document.getElementById("visualizar_id").innerText = info.event.id;
                document.getElementById("visualizar_titulo").innerText = info.event.title;
                document.getElementById("visualizar_inicio").innerText = info.event.start;
                document.getElementById("visualizar_fim").innerText = info.event.end;
            }
        });

        // Renderizar o calendário
        calendar.render();
    } else {
        console.error("Elemento de calendário não encontrado.");
    }
});

