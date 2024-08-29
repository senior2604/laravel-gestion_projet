<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Liste des Utilisateurs</h1>
    </header>
    <main>
        <h2>Utilisateurs Validés</h2>
        <ul>
            @foreach ($validatedUsers as $user)
                <li>{{ $user->name }} - {{ $user->email }}</li>
            @endforeach
        </ul>

        <h2>Utilisateurs en Attente</h2>
        <ul>
            @foreach ($pendingUsers as $user)
                <li>{{ $user->name }} - {{ $user->email }}</li>
            @endforeach
        </ul>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} Application de Gestion de Projets</p>
    </footer>
</body>
</html>
