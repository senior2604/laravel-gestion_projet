<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('image/logoP.png') }}" alt="Logo">
    </div>
    <ul>
        <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Tableau de Bord</a></li>
        <li><a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">Projets</a></li>
        <li><a href="{{ route('tasks.index') }}" class="{{ request()->routeIs('tasks.*') ? 'active' : '' }}">Tâches</a></li>
        <li><a href="{{ url('/calendar') }}" class="{{ request()->is('calendar') ? 'active' : '' }}">Calendrier</a></li>
        <li><a href="javascript:history.go(-1)">Retour</a>

        <!-- Ajouter d'autres liens selon les besoins -->
    </ul>
</div>

<div class="main-content">
    <header>
        <h1>Projets</h1>
    </header>

    <main>
        <div class="mb-3">
            <a href="{{ route('projects.create') }}" class="btn btn-primary">Créer un Nouveau Projet</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Date de Début</th>
                                <th>Date de Fin</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ Str::limit($project->description, 50) }}</td>
                                    <td>
                                        {{ $project->start_date ? $project->start_date->format('d/m/Y') : 'Non spécifiée' }}
                                    </td>

                                    <td>
                                        {{ $project->end_date ? $project->end_date->format('d/m/Y') : 'Non spécifiée' }}
                                    </td>

                                    <td>{{ ucfirst($project->status) }}</td>
                                    <td>
                                        <a href="{{ route('projects.show', $project) }}" class="btn btn-info btn-sm">Voir</a>
                                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm">Modifier</a>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Aucun projet trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto">
        <span>&copy; {{ date('Y') }} Application de Gestion de Projets. Tous droits réservés.</span>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
