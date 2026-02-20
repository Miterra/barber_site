@extends('layouts.mainLayout')

@section('title', 'Disponibilités')

@section('content')
<h1>Ajouter une disponibilité</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('admin.disponibilites.store') }}">
    @csrf
    <label>Date</label>
    <input type="date" name="date" required>
    <label>Heure début</label>
    <input type="time" name="start_time" required>
    <label>Heure fin</label>
    <input type="time" name="end_time" required>
    <button type="submit">Ajouter</button>
</form>

<h2>Créneaux disponibles</h2>
<ul>
    @foreach($dispos as $dispo)
        <li>{{ $dispo->date }} : {{ $dispo->start_time }} - {{ $dispo->end_time }}</li>
    @endforeach
</ul>
@endsection