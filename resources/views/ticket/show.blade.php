<!DOCTYPE html>
<html>
<head>
    <title>Détails du Ticket</title>
</head>
<body>
    <h1>Détails du Ticket</h1>
    <p>ID: {{ $ticket->id }}</p>
    <p>Titre: {{ $ticket->title }}</p>
    <p>Description: {{ $ticket->description }}</p>
    <p>Statut: {{ $ticket->status }}</p>
    <a href="{{ route('tickets.index') }}">Retour à la liste</a>
</body>
</html>