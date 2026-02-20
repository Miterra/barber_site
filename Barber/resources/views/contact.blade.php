@extends('layouts.mainLayout')

@section('title', 'Contactez Imko Barber')

@section('styles')
    @vite('resources/css/contact.css')
@endsection

@section('content')
<div class="contact-page">

    <!-- Fond légèrement plus clair animé -->
    <div class="background-fade"></div>
    
    <div class="contact-container">
        <h1>Contactes-moi !</h1>
        <p>Tu peux me joindre via mes réseaux, email ou téléphone :</p>
        
        <div class="contact-cards">
            <!-- Instagram -->
            <a href="https://www.instagram.com/imran6.7" target="_blank" class="contact-card insta">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg" alt="Instagram">
                <p>@imran6.7</p>
            </a>

            <!-- Snapchat -->
            <div class="contact-card snap">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Snapchat_logo.png" alt="Logo Snapchat">
                <p>imko_snap</p>
            </div>

            <!-- Email -->
            <div class="contact-card email">
                <p>Email :</p>
                <p>contact@imkobarber.com</p>
            </div>

            <!-- Téléphone -->
            <div class="contact-card phone">
                <p>Numéro :</p>
                <p>+33 6 12 34 56 78</p>
            </div>
        </div>

        <!-- Bouton retour accueil -->
        <a href="{{ url('/') }}" class="contact-card back-home">
            <p>⬅ Retour à l'accueil</p>
        </a>
    </div>
</div>
@endsection