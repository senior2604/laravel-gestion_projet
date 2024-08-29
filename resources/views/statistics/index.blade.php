<!DOCTYPE html>
<html>
<head>
    <title>Statistiques</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Inclure les styles CSS -->
</head>
<body>
    <header>
        <h1>Statistiques</h1>
        <nav>
            <a href="{{ route('dashboard') }}">Tableau de Bord</a>
            <!-- Ajouter d'autres liens de navigation si nécessaire -->
        </nav>
    </header>

    <main>
        <section>
            <h2>Résumé des Statistiques</h2>
            <ul>
                <li>Total des projets : {{ $totalProjects }}</li>
                <li>Total des tâches : {{ $totalTasks }}</li>
                <li>Tâches complètes : {{ $completedTasks }}</li>
                <li>Projets actifs : {{ $activeProjects }}</li>
                <li>Projets suspendus : {{ $suspendedProjects }}</li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Votre Entreprise. Tous droits réservés.</p>
    </footer>
</body>
</html>
