<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Assigné</title>
</head>
<body>
    <h1>Un ticket vous a été assigné</h1>
    <p><strong>Titre du Ticket:</strong> {{ $ticket->title }}</p>
    <p><strong>Description:</strong> {{ $ticket->description }}</p>
    <p><strong>Priorité:</strong> {{ $ticket->priorite->level }}</p>
    <p><strong>Statut:</strong> {{ $ticket->status }}</p>

    <p><strong>Vous avez été assigné à ce ticket. Veuillez y répondre dès que possible.</strong></p>

    <p>Cordialement,</p>
    <p>Votre équipe de support</p>
</body>
</html>
