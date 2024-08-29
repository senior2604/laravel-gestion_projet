<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord du Chef de Projet</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Tableau de Bord du Chef de Projet</h1>
    </header>
    <main>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Créer un Nouveau Projet</a>
        <h2>Projets en Cours</h2>
        <ul>
            @foreach ($projects as $project)
                <li><a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a></li>
            @endforeach
        </ul>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} Application de Gestion de Projets</p>
    </footer>
</body>
</html>
