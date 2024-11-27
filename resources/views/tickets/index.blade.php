@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Liste des Tickets</h1>

    @if(auth()->user()->isA('client'))
        <!-- Les clients peuvent créer un ticket -->
        <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Créer un ticket
        </a>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
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
                        <td>{{ Str::limit($ticket->description, 50) }}</td>
                        <td><span class="badge bg-{{ $ticket->priorite->level == 'Haute' ? 'danger' : ($ticket->priorite->level == 'Moyenne' ? 'warning' : 'success') }}">{{ $ticket->priorite->level }}</span></td>
                        <td>
                            <span class="badge bg-{{ $ticket->status == 'Ouvert' ? 'primary' : ($ticket->status == 'Affecté' ? 'info' : 'success') }}">
                                {{ $ticket->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Voir Détails
                            </a>
                            @if(auth()->user()->isA('admin'))
                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Éditer
                                </a>
                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Supprimer
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
