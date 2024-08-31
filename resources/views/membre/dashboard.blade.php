<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord du Membre</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="sidebar">
        <div class="logo">

                <img src="{{ asset('image/logoP.png') }}" alt="Logo">

        </div>
        <nav>
            <ul>
            <li> <a href="javascript:history.back()">Retour</a></li>
            <li><a href="#">Calendrier</a></li>
            </ul>
        </nav>
    </header>
    <div class="main-content">
        <main class="dashboard-container">
            <h1>Tableau de Bord </h1>
            <h2>Mes Projets</h2>
            <div class="card">
                <div class="card-header">Projets</div>
                <div class="card-body">
                    <ul>
                        @foreach ($projects as $project)
                            <li><a href="{{ route('member.show', $project) }}">{{ $project->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <h2>Mes Tâches</h2>
            <div class="card">
                <div class="card-header">Tâches</div>
                <div class="card-body">
                    <ul>
                        @foreach ($tasks as $task)
                            <li>{{ $task->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </main>
    </div>
    <footer class="footer">
        <p>&copy; {{ date('Y') }} Application de Gestion de Projets</p>
    </footer>
</body>
</html>
