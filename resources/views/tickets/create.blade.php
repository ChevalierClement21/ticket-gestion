@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un Nouveau Ticket</h1>
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="priorite_id">Priorité</label>
            <select name="priorite_id" id="priorite_id" class="form-control" required>
                @foreach($priorites as $priorite)
                    <option value="{{ $priorite->id }}">{{ $priorite->level }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" id="categorie_id" class="form-control" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Créer le Ticket</button>
    </form>
</div>
@endsection
