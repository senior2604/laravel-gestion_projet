<!DOCTYPE html>
<html>
<head>
    <title>Liste des Tâches</title>
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
            <li><a href="{{ route('calendar.show') }}" class="{{ request()->routeIs('calendar.show') ? 'active' : '' }}">Calendrier</a></li>
            <li><a href="{{ route('reports.create') }}" class="{{ request()->routeIs('reports.*') ? 'active' : '' }}">Rapports</a></li>
            <li><a href="javascript:history.go(-1)">Retour</a>
            </li>
        </ul>

    </div>
    <div class="main-content">
        <h1>Liste des Tâches</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Créer une Tâche</a>
        </div>

        <!-- Formulaire de recherche -->
        <form method="GET" action="{{ route('tasks.index') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Rechercher par nom ou description" value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-control">
                        <option value="">Filtrer par statut</option>
                        <option value="à faire" {{ request('status') == 'à faire' ? 'selected' : '' }}>À faire</option>
                        <option value="en cours" {{ request('status') == 'en cours' ? 'selected' : '' }}>En cours</option>
                        <option value="terminé" {{ request('status') == 'terminé' ? 'selected' : '' }}>Terminé</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success">Rechercher</button>
                </div>
            </div>
        </form>

        <!-- Table des tâches -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Projet</th>
                    <th>Utilisateur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->project->name }}</td>
                        <td>{{ $task->user->name }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Aucune tâche trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <footer class="footer mt-auto">
            <span>&copy; {{ date('Y') }} Application de Gestion de Projets. Tous droits réservés.</span>
        </footer>
  </div>

</body>
</html>
