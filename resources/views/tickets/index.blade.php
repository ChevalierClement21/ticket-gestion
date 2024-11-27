@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Tickets</h1>

    @if(auth()->user()->isA('client'))
        <!-- Les clients peuvent créer un ticket -->
        <a href="{{ route('tickets.create') }}" class="btn btn-primary">Créer un ticket</a>
    @endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Priorité</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->priorite->level }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>
                        <a href="{{ route('tickets.show', $ticket) }}" class="bg-blue-500 text-white py-2 px-4 rounded">Voir Détails</a>
                    </td>
                    @if(auth()->user()->isA('admin'))
                        <td>
                            <!-- Seuls les admins peuvent éditer et supprimer -->
                            <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
