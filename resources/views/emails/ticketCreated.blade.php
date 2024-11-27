<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un Nouveau Ticket a été Créé</title>
</head>
<body>
    <h1>Un Nouveau Ticket a été Créé</h1>
    <p><strong>Titre :</strong> {{ $ticket->title }}</p>
    <p><strong>Description :</strong> {{ $ticket->description }}</p>
    <p><strong>Priorité :</strong> {{ $ticket->priorite->level }}</p>
    <p><strong>Statut :</strong> {{ $ticket->status }}</p>
    <p><strong>Catégorie :</strong> {{ $ticket->categorie->name }}</p>

    <p>Vous pouvez consulter le ticket à tout moment en cliquant sur le lien ci-dessous :</p>
    <p><a href="{{ url(route('tickets.show', $ticket->id)) }}">Voir le Ticket</a></p>
</body>
</html>
