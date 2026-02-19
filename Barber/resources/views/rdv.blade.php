@extends('layouts.mainLayout')

@section('content')

@section('styles')
    @vite('resources/css/rdv.css')
@endsection

<div class="rdv-container">
    <h1>Prendre rendez-vous</h1>

    <form action="{{ route('rdv.store') }}" method="POST">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email">Votre email</label>
            <input type="email" name="email" id="email" required>
        </div>

        <!-- Date -->
        <div class="form-group">
            <label for="date">Choisissez une date</label>
            <input type="date" name="date" id="date" required>
        </div>

        <!-- Heure -->
        <div class="form-group">
            <label for="heure">Choisissez une heure</label>
            <select name="heure" id="heure" required>
                <option value="">-- Sélectionner une heure --</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
            </select>
        </div>

        <button type="submit" class="btn-confirm">
            Confirmer le rendez-vous
        </button>

    </form>
</div>

@endsection