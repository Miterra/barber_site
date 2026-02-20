document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var selectedEvent = null;

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        locale: 'fr',
        firstDay: 1,
        slotMinTime: "08:00:00",
        slotMaxTime: "23:00:00",
        allDaySlot: false,
        selectable: true,
        selectMirror: false,      // pas de drag mirror
        selectOverlap: false,     // pas de sélection sur un créneau réservé
        slotDuration: "00:30:00", // 30min
        selectLongPressDelay: 0,  // ⚡ permet un simple clic pour sélectionner
        events: '/rdv/events',

        // Format 24h
        slotLabelFormat: { hour: '2-digit', minute: '2-digit', hour12: false },
        eventTimeFormat: { hour: '2-digit', minute: '2-digit', hour12: false },

        select: function(info) {
            // Supprime ancienne sélection si elle existe
            if(selectedEvent) {
                selectedEvent.remove();
                selectedEvent = null;
            }

            // Crée l'événement bleu pour la sélection
            selectedEvent = calendar.addEvent({
                title: info.startStr.substring(11,16), // juste l'heure
                start: info.start,
                end: info.end,
                color: '#3498db',         // bleu
                textColor: 'white',
                editable: false
            });

            // Remplit le formulaire caché
            document.getElementById('rdvDate').value = info.startStr.split('T')[0];
            document.getElementById('rdvHeure').value = info.startStr.split('T')[1].substring(0,5);

            // Affiche le formulaire
            document.getElementById('rdvForm').style.display = 'block';
        }
    });

    calendar.render();
});