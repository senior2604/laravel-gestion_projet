<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Projet</title>
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
        <!-- Ajouter d'autres liens selon les besoins -->
    </ul>
</div>

<div class="main-content">
    <header>
        <h1 class="text-center my-4">Détails du Projet</h1>
    </header>

    <main>
        <div class="card mb-4">
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Nom:</dt>
                    <dd class="col-sm-9">{{ $project->name }}</dd>

                    <dt class="col-sm-3">Description:</dt>
                    <dd class="col-sm-9">{{ $project->description }}</dd>

                    <dt class="col-sm-3">Date de Début:</dt>
                    <dd class="col-sm-9">{{ $project->start_date->format('d/m/Y') }}</dd>

                    <dt class="col-sm-3">Date de Fin:</dt>
                    <dd class="col-sm-9">{{ $project->end_date->format('d/m/Y') }}</dd>

                    <dt class="col-sm-3">Statut:</dt>
                    <dd class="col-sm-9">{{ ucfirst($project->status) }}</dd>
                </dl>

                <div class="d-flex justify-content-start">
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
