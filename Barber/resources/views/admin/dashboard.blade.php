@extends('admin.layouts.app')

@section('content')
<h1>Dashboard Admin</h1>

@if(session('success'))
    <div style="color: green; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

<h2>Rendez-vous</h2>

<table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-bottom: 30px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rdvs as $rdv)
            <tr>
                <td>{{ $rdv->id }}</td>
                <td>{{ $rdv->prenom }}</td>
                <td>{{ $rdv->email }}</td>
                <td>{{ $rdv->date }}</td>
                <td>{{ $rdv->heure }}</td>
                <td>
                    <form action="{{ route('admin.deleteRdv', $rdv->id) }}" method="POST" onsubmit="return confirm('Supprimer ce rendez-vous ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red;">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Aucun rendez-vous pour l'instant.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<h2>Disponibilités</h2>

<table border="1" cellpadding="10" cellspacing="0" style="width:100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($dispos as $dispo)
            <tr>
                <td>{{ $dispo->id }}</td>
                <td>{{ $dispo->date }}</td>
                <td>{{ $dispo->start_time }}</td>
                <td>{{ $dispo->end_time }}</td>
                <td>
                    <form action="{{ route('admin.deleteDisponibilite', $dispo->id) }}" method="POST" onsubmit="return confirm('Supprimer cette disponibilité ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red;">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Aucune disponibilité pour l'instant.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection