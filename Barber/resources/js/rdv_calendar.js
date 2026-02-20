document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var rdvForm = document.getElementById('rdvForm');
    var rdvDateInput = document.getElementById('rdvDate');
    var rdvHeureInput = document.getElementById('rdvHeure');
    var selectedEvent = null;

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        locale: 'fr',
        firstDay: 1,
        slotMinTime: "08:00:00",
        slotMaxTime: "22:30:00",
        allDaySlot: false,
        selectable: true,
        selectMirror: false,
        selectOverlap: false,
        slotDuration: "00:30:00",
        selectLongPressDelay: 0,
        events: '/rdv/events',
        slotLabelFormat: { hour: '2-digit', minute: '2-digit', hour12: false },
        eventTimeFormat: { hour: '2-digit', minute: '2-digit', hour12: false },

        select: function(info) {
            // Supprime ancienne sélection
            if(selectedEvent) selectedEvent.remove();

            // Crée un petit événement bleu sur le calendrier
            selectedEvent = calendar.addEvent({
                title: info.startStr.substring(11,16),
                start: info.start,
                end: info.end,
                color: '#3498db',
                textColor: 'white',
                editable: false
            });

            // Remplir le formulaire caché
            rdvDateInput.value = info.startStr.split('T')[0];
            rdvHeureInput.value = info.startStr.split('T')[1].substring(0,5);

            // Affiche le formulaire
            rdvForm.style.display = 'block';
        }
    });

    calendar.render();

    // Vérifie que le formulaire n'est pas soumis sans heure
    rdvForm.addEventListener('submit', function(e) {
        if(!rdvHeureInput.value){
            e.preventDefault();
            alert('Veuillez sélectionner un créneau sur le calendrier.');
        }
    });
});