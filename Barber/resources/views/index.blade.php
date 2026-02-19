@extends('layouts.mainLayout')

@section('title', 'Imko Barber')

@section('styles')
    @vite('resources/css/test.css')
@endsection

@section('content')
    <h1>Bienvenue sur le site du barber !</h1>
    <p>Que voulez-vous faire ?</p>

    <main>
        <select id="choix">
            <option value="1">Sélectionnez une option</option>
            <option value="2">Prendre rendez-vous</option>
            <option value="3">Annuler un rendez-vous</option>
            <option value="4">Déposer un avis</option>
        </select>

        <article>
            <p>Contact : 01 23 45 67 89</p>
        </article>
    </main>
@endsection
