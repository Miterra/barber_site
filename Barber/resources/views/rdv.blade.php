@extends('layouts.mainLayout')

@section('title', 'Prendre un Rendez-vous')

@section('styles')
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @vite('resources/css/rdv.css') <!-- ton nouveau CSS -->
@endsection

@section('content')
    <h1 class="rdv-title">Prendre un rendez-vous</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('rdv.store') }}" class="rdv-form">
        @csrf
        <div class="form-group">
            <label for="email">Votre email</label>
            <input type="email" name="email" id="email" required placeholder="ex: email@exemple.com">
        </div>

        <div class="form-group">
            <label for="date">Choisissez une date</label>
            <input type="text" name="date" id="date" required placeholder="YYYY-MM-DD">
        </div>

        <div class="form-group">
            <label for="heure">Choisissez une heure</label>
            <select name="heure" id="heure" required>
                <option value="">-- Sélectionner une heure --</option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Confirmer le rendez-vous</button>
    </form>
@endsection

@section('scripts')
    @vite('resources/js/rdv.js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection