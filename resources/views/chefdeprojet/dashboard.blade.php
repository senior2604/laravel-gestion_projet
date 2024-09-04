<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord du Chef de Projet</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="sidebar">
        <div class="logo">
            <img src="{{ asset('image/logoP.png') }}" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('tasks.index') }}">Tâches</a></li>
                <li><a href="{{ url('/calendar') }}" class="{{ request()->is('calendar') ? 'active' : '' }}">Calendrier</a></li>
                <li><a href="{{ route('reports.create') }}" class="{{ request()->routeIs('reports.*') ? 'active' : '' }}">Rapports</a></li>
                <li><a href="javascript:history.back()">Retour</a></li>
            </ul>
        </nav>
    </header>
    <div class="main-content">
        <main class="dashboard-container">
            <h1>Tableau de Bord</h1>

            <!-- Section Projets -->
            <h2>Mes Projets</h2>
            <div class="card">
                <div class="card-header">Projets</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom du Projet</th>
                                <th>Date de Début</th>
                                <th>Date de Fin</th>
                                <th>Status</th>
                                <th>Modifier</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($project->end_date)->format('d F Y') }}</td>
                                    <td>{{ $project->status }}</td>
                                    <td>
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Aucun projet pour le moment.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Section Membres d'Équipe -->
            <h2>Membres de l'Équipe</h2>
            @foreach ($projects as $project)
                <div class="card">
                    <div class="card-header">Membres de l'Équipe pour le Projet: {{ $project->name }}</div>
                    <div class="card-body">
                        <div class="team-member-grid">
                            @forelse ($teamMembers[$project->id] as $member)
                                <div class="team-member-card">
                                    <div class="member-badge">
                                        {{ strtoupper(substr($member->name, 0, 1)) }}
                                    </div>
                                    <div class="member-info">
                                        <h3>{{ $member->name }}</h3>
                                        <p>{{ $member->email }}</p>
                                    </div>
                                </div>
                            @empty
                                <p>Aucun membre d'équipe assigné.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Section Tâches -->
            <h2>Mes Tâches</h2>
            <div class="card">
                <div class="card-header">Tâches</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom de la Tâche</th>
                                <th>Date de Début</th>
                                <th>Date de Fin</th>
                                <th>Status</th>
                                <th>Projet Associé</th>
                                <th>Modifier</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($task->start_date)->format('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($task->end_date)->format('d F Y') }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>{{ $task->project->name }}</td>
                                    <td>
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Aucune tâche assignée pour le moment.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <footer class="footer">
        <p>&copy; {{ date('Y') }} Application de Gestion de Projets. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
