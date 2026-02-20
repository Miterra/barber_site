@extends('layouts.mainLayout')

@section('title', 'Imko Barber')

@section('styles')
    @vite('resources/css/index.css')
    @vite('resources/js/index.js')
@endsection

@section('content')
    <h1>Bienvenue sur le site du barber !</h1>
    <p>Que voulez-vous faire ?</p>

    <a href="{{ route('admin.login') }}" class="admin-btn">
    Admin
</a>
</div>

    <main>
        <select id="choix">
            <option value="">Sélectionnez une option</option>
            <option value="{{ route('contact') }}">Contact</option>
            <option value="{{ route('photos') }}">Photos du service</option>
        </select>
        <br>
        <a href="{{ route('rdv') }}">Je veux prendre rendez-vous !</a>

        <article>
            <p>Insta : imran6.7</p>
        </article>
    </main>
@endsection
