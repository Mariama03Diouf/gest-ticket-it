<!DOCTYPE html>
<html>
<head>
    <title>Créer un Nouveau Ticket</title>
</head>
<body>
    <h1>Créer un Nouveau Ticket</h1>
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <label for="title">Titre:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <button type="submit">Créer</button>
    </form>
</body>
</html>