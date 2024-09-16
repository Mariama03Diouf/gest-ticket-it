<!DOCTYPE html>
<html>
<head>
    <title>Modifier le Ticket</title>
</head>
<body>
    <h1>Modifier le Ticket</h1>
    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Titre:</label>
        <input type="text" id="title" name="title" value="{{ $ticket->title }}" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ $ticket->description }}</textarea>
        <br>
        <label for="status">Statut:</label>
        <select id="status" name="status">
            <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Ouvert</option>
            <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>En cours</option>
            <option value="resolved" {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Résolu</option>
        </select>
        <br>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>

