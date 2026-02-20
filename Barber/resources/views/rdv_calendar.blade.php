@extends('layouts.mainLayout')

@section('title', 'Prendre un rendez-vous')

@section('styles')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<link rel="stylesheet" href="{{ Vite::asset('resources/css/rdv.css') }}">
@endsection

@section('content')
<h1 class="rdv-title">Prendre un rendez-vous</h1>

@if(session('success'))
    <div style="color:green; text-align:center; margin-bottom:15px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="color:red; text-align:center; margin-bottom:15px;">
        {{ session('error') }}
    </div>
@endif

<div id="calendar" data-events-url="{{ route('rdv.events') }}"></div>

<div class="rdv-return">
    <a href="{{ route('accueil') }}" class="btn-return">← Retour à l'accueil</a>
</div>

<form method="POST" action="{{ route('rdv.store') }}" id="rdvForm" class="rdv-form" style="display:none;">
    @csrf
    <input type="hidden" name="date" id="rdvDate">
    <input type="hidden" name="heure" id="rdvHeure">

    <div class="form-group">
        <label>Prénom</label>
        <input type="text" name="prenom" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <button type="submit" class="btn-submit">Confirmer le rendez-vous</button>
</form>
@endsection

@section('scripts')
    @vite('resources/js/rdv_calendar.js')
@endsection