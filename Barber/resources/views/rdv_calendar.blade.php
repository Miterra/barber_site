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
        <input type="email" name="email" required placeholder="ex: email@exemple.com">
    </div>

    <button type="submit" class="btn-submit">Confirmer le rendez-vous</button>
</form>
@endsection

@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<script src="{{ Vite::asset('resources/js/rdv_calendar.js') }}"></script>
@endsection