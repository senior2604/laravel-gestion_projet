<!DOCTYPE html>
<html>
<head>
    <title>Modifier une Tâche</title>
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
        <h1>Modifier une Tâche</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $task->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="5">{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Statut</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="à faire" {{ old('status', $task->status) == 'à faire' ? 'selected' : '' }}>À faire</option>
                    <option value="en cours" {{ old('status', $task->status) == 'en cours' ? 'selected' : '' }}>En cours</option>
                    <option value="terminé" {{ old('status', $task->status) == 'terminé' ? 'selected' : '' }}>Terminé</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="project_id">Projet</label>
                <select id="project_id" name="project_id" class="form-control" required>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
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
                        <option value="{{ $user->id }}" {{ old('user_id', $task->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        </form>
    </div>
    <footer class="footer mt-auto">
        <span>&copy; {{ date('Y') }} Application de Gestion de Projets. Tous droits réservés.</span>
    </footer>
</body>
</html>
