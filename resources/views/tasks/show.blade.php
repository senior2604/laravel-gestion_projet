<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Tâche</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('image/logoP.png') }}" alt="Logo">
        </div>
        <ul>
            <li><a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">Projets</a></li>
            <li><a href="{{ route('tasks.index') }}" class="{{ request()->routeIs('tasks.*') ? 'active' : '' }}">Tâches</a></li>
            <li><a href="{{ url('/calendar') }}" class="{{ request()->is('calendar') ? 'active' : '' }}">Calendrier</a></li>
            <li><a href="{{ route('reports.create') }}" class="{{ request()->routeIs('reports.*') ? 'active' : '' }}">Rapports</a></li>
            <li><a href="javascript:history.go(-1)">Retour</a>
            </li>
        </ul>

    </div>
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
