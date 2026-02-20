@extends('layouts.mainLayout')

@section('title', 'Prendre un rendez-vous')

@section('styles')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css' rel='stylesheet' />
<link rel="stylesheet" href="{{ Vite::asset('resources/css/rdv.css') }}">
@endsection

@section('content')
<h1 class="rdv-title">Prendre un rendez-vous</h1>

<div id="calendar"></div>

<!-- Bouton retour -->
<div class="rdv-return">
    <a href="{{ route('accueil') }}" class="btn-return">← Retour à l'accueil</a>
</div>

<!-- Formulaire de rendez-vous -->
<form method="POST" action="{{ route('rdv.store') }}" id="rdvForm" class="rdv-form" style="display:none;">
    @csrf
    <input type="hidden" name="date" id="rdvDate">
    <input type="hidden" name="heure" id="rdvHeure">

    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" required placeholder="Votre prénom">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required placeholder="ex: email@exemple.com">
    </div>

    <button type="submit" class="btn-submit">Confirmer le rendez-vous</button>
</form>
@endsection

@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<script>
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
</script>
@endsection