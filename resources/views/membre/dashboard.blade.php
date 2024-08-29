<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord du Membre</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Tableau de Bord du Membre</h1>
    </header>
    <main>
        <h2>Mes Projets</h2>
        <ul>
            @foreach ($projects as $project)
                <li><a href="{{ route('member.show', $project) }}">{{ $project->name }}</a></li>
            @endforeach
        </ul>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} Application de Gestion de Projets</p>
    </footer>
</body>
</html>
