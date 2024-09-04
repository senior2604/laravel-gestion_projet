<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Projet</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('image/logoP.png') }}" alt="Logo">
        </div>
        <ul>
            <li><a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">Projets</a></li>
            <li><a href="{{ route('tasks.index') }}" class="{{ request()->routeIs('tasks.*') ? 'active' : '' }}">Tâches</a></li>
            <li><a href="{{ url('/calendar') }}" class="{{ request()->is('calendar') ? 'active' : '' }}">Calendrier</a></li>
            <li><a href="{{ route('reports.create') }}" class="{{ request()->routeIs('reports.*') ? 'active' : '' }}">Rapports</a></li>
            <li><a href="javascript:history.go(-1)">Retour</a></li>
        </ul>
    </div>

    <div class="main-content">

    <h1>Créer un Nouveau Projet</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nom du Projet</label>
            <input type="text" id="name" name="name" class="form-control" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Statut</label>
            <select id="status" name="status" class="form-select" required>
                <option value="actif">Actif</option>
                <option value="suspendu">Suspendu</option>
                <option value="terminé">Terminé</option>
            </select>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description du Projet</label>
            <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="start_date">Date de Début</label>
                <p>{{ $project->start_date ? $project->start_date->format('d/m/Y') : 'Non spécifiée' }}</p>
            </div>

            <div class="form-group">
                <label for="end_date">Date de Fin</label>
                <p>{{ $project->end_date ? $project->end_date->format('d/m/Y') : 'Non spécifiée' }}</p>
            </div>
        </div>

        <div class="form-group">
            <label for="budget">Budget</label>
            <input type="number" id="budget" name="budget" class="form-control" step="0.01">
            @error('budget')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="project_manager_id">Manager du Projet</label>
            <select id="project_manager_id" name="project_manager_id" class="form-select" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('project_manager_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="team_members">Membres de l'Équipe</label>
            <select id="team_members" name="team_members[]" class="form-select" multiple required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <small class="form-text">Maintenez la touche Ctrl (Windows) ou Cmd (Mac) pour sélectionner plusieurs membres.</small>
            @error('team_members')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Créer le Projet</button>
    </form>

    <footer class="footer mt-auto">
        <span>&copy; {{ date('Y') }} Application de Gestion de Projets. Tous droits réservés.</span>
    </footer>
    </div>
</body>
</html>
