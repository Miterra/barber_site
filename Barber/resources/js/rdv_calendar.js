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
        slotMaxTime: "22:00:00",

        allDaySlot: false,
        selectable: true,
        selectMirror: false,
        selectOverlap: false,

        slotDuration: "00:30:00",
        snapDuration: "00:30:00",

        events: calendarEl.dataset.eventsUrl,

        eventClick: function() {
            // Si on clique sur un événement rouge → on ne peut rien faire
            return false;
        },

        select: function(info) {

            // Supprime ancien bleu si existe
            if (selectedEvent) {
                selectedEvent.remove();
            }

            // Crée bloc bleu temporaire
            selectedEvent = calendar.addEvent({
                title: info.startStr.substring(11,16),
                start: info.start,
                end: info.end,
                color: '#3498db',
                textColor: 'white',
                editable: false
            });

            // Remplit le formulaire
            rdvDateInput.value = info.startStr.split('T')[0];
            rdvHeureInput.value = info.startStr.split('T')[1].substring(0,5);

            rdvForm.style.display = 'block';
            rdvForm.scrollIntoView({ behavior: "smooth" });
        },

        unselect: function() {
            if (selectedEvent) {
                selectedEvent.remove();
                selectedEvent = null;
            }
        }
    });

    calendar.render();

});