@extends('layouts.mainLayout')

@section('title', 'Liste des RDV Admin')

@section('content')
<h1>Rendez-vous</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table class="border-collapse border border-gray-400 w-full">
    <thead>
        <tr class="border border-gray-400">
            <th class="border border-gray-400 p-2">Client</th>
            <th class="border border-gray-400 p-2">Email</th>
            <th class="border border-gray-400 p-2">Date</th>
            <th class="border border-gray-400 p-2">Heure</th>
            <th class="border border-gray-400 p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rdvs as $rdv)
            <tr class="border border-gray-400">
                <td class="border border-gray-400 p-2">{{ $rdv->client_name ?? $rdv->name ?? 'N/A' }}</td>
                <td class="border border-gray-400 p-2">{{ $rdv->email ?? 'N/A' }}</td>
                <td class="border border-gray-400 p-2">{{ $rdv->date }}</td>
                <td class="border border-gray-400 p-2">{{ $rdv->time }}</td>
                <td class="border border-gray-400 p-2">
                    <form action="{{ route('admin.rdv.delete', $rdv->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection