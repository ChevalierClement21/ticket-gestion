@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Ticket</h1>
    <p><strong>Titre:</strong> {{ $ticket->title }}</p>
    <p><strong>Description:</strong> {{ $ticket->description }}</p>
    <p><strong>Priorité:</strong> {{ $ticket->priorite->level }}</p>
    <p><strong>Statut:</strong> {{ $ticket->status }}</p>

    @if(auth()->user()->isA('client') && $ticket->status !== 'Annulé' && $ticket->status !== 'Résolu')
    <form action="{{ route('tickets.cancel', $ticket) }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">Annuler le Ticket</button>
    </form>
    @endif

    @if(auth()->user()->isA('client') && $ticket->status === 'Affecté')
    <form action="{{ route('tickets.resolve', $ticket) }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-success">Marquer comme Résolu</button>
    </form>
    @endif
    <h3>Commentaires</h3>
    <ul>
        @foreach($comments as $comment)
            <li>
                <strong>{{ $comment->user->name }}:</strong>
                <p>{{ $comment->content }}</p>
                <p><small>Posté le : {{ $comment->created_at }}</small></p>
            </li>
        @endforeach
    </ul>
    @if(auth()->user()->isA('client') || auth()->user()->isA('developer'))
        <!-- Désactiver le formulaire si le ticket est annulé -->
        @if($ticket->status !== 'Annulé' && $ticket->status !== 'Résolu' )
            <form action="{{ route('commentaires.store', $ticket) }}" method="POST">
                @csrf
                <textarea name="content" rows="3" placeholder="Ajouter un commentaire..." required></textarea>
                <button type="submit" class="btn btn-primary mt-2">Ajouter</button>
            </form>
        @else
            <p class="text-danger mt-3">Vous ne pouvez pas ajouter de commentaire sur un ticket annulé.</p>
        @endif
    @endif

    @if(auth()->user()->isA('admin'))
    <!-- Formulaire d'assignation d'un développeur -->
    <form action="{{ route('tickets.assign', $ticket) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="developer_id">Assigner à un développeur :</label>
            <select name="developer_id" id="developer_id" class="form-control" required>
                <option value="">Sélectionnez un développeur</option>
                @foreach($developers as $developer)
                    <option value="{{ $developer->id }}" {{ $ticket->developer_id == $developer->id ? 'selected' : '' }}>
                        {{ $developer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="status">Statut du ticket :</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Affecté" {{ $ticket->status == 'Affecté' ? 'selected' : '' }}>Affecté</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Assigner et Mettre à jour le statut</button>
    </form>
    @endif
</div>
@endsection
