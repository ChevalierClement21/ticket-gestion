@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Ticket</h1>
    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $ticket->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $ticket->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="priorite_id">Priorité</label>
            <select name="priorite_id" id="priorite_id" class="form-control" required>
                @foreach($priorites as $priorite)
                    <option value="{{ $priorite->id }}" {{ $ticket->priorite_id == $priorite->id ? 'selected' : '' }}>
                        {{ $priorite->level }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" id="categorie_id" class="form-control" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $ticket->categorie_id == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
