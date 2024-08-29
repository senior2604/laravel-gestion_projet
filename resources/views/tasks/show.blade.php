<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Tâche</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Détails de la Tâche</h1>
    </header>
    <main>
        <p><strong>Nom:</strong> {{ $task->name }}</p>
        <p><strong>Projet:</strong> {{ $task->project->name }}</p>
        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Modifier la Tâche</a>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Retour aux Tâches</a>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} Application de Gestion de Projets</p>
    </footer>
</body>
</html>
