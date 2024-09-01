<!DOCTYPE html>
<html>
<head>
    <title>Créer une Tâche</title>
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
        <h1>Créer une Tâche</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Statut</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="en_attente" {{ old('status') == 'en_attente' ? 'selected' : '' }}>En attente</option>
                    <option value="en_cours" {{ old('status') == 'en_cours' ? 'selected' : '' }}>En cours</option>
                    <option value="terminée" {{ old('status') == 'terminée' ? 'selected' : '' }}>Terminé</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="project_id">Projet</label>
                <select id="project_id" name="project_id" class="form-control" required>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
                @error('project_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="user_id">Utilisateur</label>
                <select id="user_id" name="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
    <footer class="footer mt-auto">
        <span>&copy; {{ date('Y') }} Application de Gestion de Projets. Tous droits réservés.</span>
    </footer>
</body>
</html>
