@extends('layouts.mainLayout')

@section('title', 'Connexion Admin')

@section('styles')
    @vite('resources/css/index.css')
@endsection

@section('content')
    <h1>Connexion Admin</h1>

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Mot de passe</label>
        <input type="password" name="password" required>
        <button type="submit">Se connecter</button>
    </form>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color:red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
@endsection