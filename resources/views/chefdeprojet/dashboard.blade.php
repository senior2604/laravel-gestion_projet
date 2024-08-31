<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Chef de Projet</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="sidebar">
        <div class="logo">
        <img src="{{ asset('image/logoP.png') }}" alt="Logo">
    </div>
    <ul>
        <li>
            <a class="active" href="{{ route('projects.index') }}">Projets</a>
        </li>
        <li>
            <a href="{{ route('tasks.index') }}">Tâches</a>
        </li>
        <li>
            <a href="{{ route('statistics.index') }}">Statistiques</a>
        </li>
    </ul>
    </div>
    <!-- Conteneur principal -->
    <div class="main-content">
        <header>
            <h1>Mes Projets et Tâches</h1>
        </header>

        <!-- Liste des Projets et Tâches -->
        <section class="project-task-list">
            @if($projects->isEmpty())
                <p>Vous n'avez aucun projet assigné pour le moment.</p>
            @else
                @foreach($projects as $project)
                    <div class="project-card">
                        <h2>{{ $project->name }}</h2>
                        <p>{{ $project->description }}</p>
                        <p><strong>Date de début :</strong> {{ $project->start_date }}</p>
                        <p><strong>Date de fin :</strong> {{ $project->end_date }}</p>
                        <p><strong>Status :</strong> {{ ucfirst($project->status) }}</p>

                        <!-- Liste des Tâches associées -->
                        <div class="tasks">
                            <h3>Tâches</h3>
                            @if($project->tasks->isEmpty())
                                <p>Aucune tâche assignée pour ce projet.</p>
                            @else
                                <ul>
                                    @foreach($project->tasks as $task)
                                        <li>
                                            <strong>{{ $task->title }}</strong> - {{ $task->description }}
                                            <br><strong>Status :</strong> {{ ucfirst($task->status) }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </section>
    </div>

    <!-- Pied de page -->
    <footer class="footer">
        <p>&copy; 2024 Gestion de Projets</p>
    </footer>
</body>
</html>
