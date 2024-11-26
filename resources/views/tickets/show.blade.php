@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Détails du Ticket</h1>
            <div>
                <p><strong>Nom :</strong> {{ $ticket->title }}</p>
                <p><strong>Description :</strong> {{ $ticket->description }}</p>
                <p><strong>Priorité :</strong> {{ $ticket->priorite->level }}</p>
                <p><strong>Statut :</strong> {{ $ticket->status }}</p>
                <p><strong>Catégorie :</strong> {{ $ticket->categorie->name }}</p>
                <p><strong>Créé le :</strong> {{ $ticket->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="mt-6">
                <a href="{{ route('tickets.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Retour à la liste</a>
            </div>
        </div>
    </div>
@endsection
