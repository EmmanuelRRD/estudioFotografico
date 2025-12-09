document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendario');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es', // Opcional: meses y días en español
        height: 'auto',
        events: function(fetchInfo, successCallback, failureCallback) {
            // Llamada al endpoint
            fetch('backend/controllers/clientes/fotografos_disponibles.php')
                .then(response => response.json())
                .then(data => {
                    // Convertimos los datos al formato que FullCalendar necesita
                    const eventos = data.map(item => ({
                        title: `${item.fotografo} - ${item.paquete}`,
                        start: item.fecha_reunion,
                        allDay: true, // marcar todo el día
                        color: '#3c2e1eff' // opcional: color de eventos
                    }));
                    successCallback(eventos);
                })
                .catch(error => {
                    console.error('Error cargando eventos:', error);
                    failureCallback(error);
                });
        }
    });

    calendar.render();
});
