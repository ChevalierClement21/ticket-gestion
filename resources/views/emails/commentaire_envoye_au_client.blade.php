<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un nouveau commentaire sur votre ticket</title>
</head>
<body>
    <h1>Un développeur a ajouté un commentaire à votre ticket</h1>
    <p><strong>Titre du Ticket:</strong> {{ $ticket->title }}</p>
    <p><strong>Description:</strong> {{ $ticket->description }}</p>
    <p><strong>Priorité:</strong> {{ $ticket->priorite->level }}</p>
    <p><strong>Statut:</strong> {{ $ticket->status }}</p>

    <h3>Commentaire du Développeur:</h3>
    <p>{{ $commentaire->content }}</p>

    <p>Cordialement,</p>
    <p>Votre équipe de support</p>
</body>
</html>
