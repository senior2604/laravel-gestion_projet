<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Projet</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
    </style>
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
        <!-- Ajouter d'autres liens selon les besoins -->
    </ul>
</div>

<div class="main-content">
    <header>
        <h1 class="text-center my-4">Détails du Projet</h1>
    </header>

    <main>
        <!-- Table des Détails du Projet -->
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Nom</th>
                <td>{{ $project->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $project->description }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ ucfirst($project->status) }}</td>
            </tr>
            <tr>
                <th>Date de Début</th>
                <td>{{ $project->start_date->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Date de Fin</th>
                <td>{{ $project->end_date->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Budget</th>
                <td>{{ $project->budget }}</td>
            </tr>
            <tr>
                <th>Responsable du Projet</th>
                <td>{{ $project->project_manager_id ? $project->projectManager->name : 'Non assigné' }}</td>
            </tr>
        </tbody>
    </table>
                <!-- Section Équipe -->
                <div class="mt-4">
                    <h3>Membres du Projet</h3>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Rôle</th>
                                <th>Email</th>
                            </tr>
                        </thead>

                    </table>
                </div>

                <div class="d-flex justify-content-start mt-4">
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning me-2">Modifier le Projet</a>
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Retour aux Projets</a>
                </div>
            </div>
        </div>
    </main>

</div>

<footer class="footer mt-4 py-3 bg-light text-center">
    <span>&copy; {{ date('Y') }} Application de Gestion de Projets. Tous droits réservés.</span>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
