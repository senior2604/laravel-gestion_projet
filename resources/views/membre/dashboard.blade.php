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

                <li><a href="{{ url('/calendar') }}" class="{{ request()->is('calendar') ? 'active' : '' }}">Calendrier</a></li>
                <li><a href="{{ route('reports.create') }}" class="{{ request()->routeIs('reports.*') ? 'active' : '' }}">Rapports</a></li>
                <li><a href="javascript:history.go(-1)">Retour</a>
                
            </ul>
        </nav>
    </header>
    <div class="main-content">
        <main class="dashboard-container">
            <h1>Tableau de Bord</h1>
            <h2>Mes Projets</h2>
            <div class="card">
                <div class="card-header">Projets</div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom du Projet</th>
                                <th>Date de Début</th>
                                <th>Date de Fin</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($project->end_date)->format('d F Y') }}</td>
                                    <td>{{ $project->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <h2>Mes Tâches</h2>
            <div class="card">
                <div class="card-header">Tâches</div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom de la Tâche</th>
                                <th>Date de Début</th>
                                <th>Date de Fin</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($task->start_date)->format('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($task->end_date)->format('d F Y') }}</td>
                                    <td>{{ $task->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <footer class="footer">
        <p>&copy; {{ date('Y') }} Application de Gestion de Projets</p>
    </footer>
</body>
</html>
