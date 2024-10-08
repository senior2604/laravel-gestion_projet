<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Projet</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('image/logoP.png') }}" alt="Logo">
    </div>
    <ul>
        <li><a href="{{ route('projects.index') }}">Projets</a></li>
        <li><a href="{{ route('tasks.index') }}">Tâches</a></li>
        <li><a href="{{ url('/calendar') }}" class="{{ request()->is('calendar') ? 'active' : '' }}">Calendrier</a></li>
        <li><a href="{{ route('statistics.index') }}">Statistiques</a></li>
    </ul>
</div>

<div class="main-content">
    <h1>Modifier le Projet</h1>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Informations du Projet</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('projects.update', $project) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nom du Projet -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nom du Projet</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $project->name) }}" class="form-control" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description du Projet -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" required>{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date de Début -->
                <div class="mb-3">
                    <label for="start_date" class="form-label">Date de Début</label>
                    <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $project->start_date->format('Y-m-d')) }}" class="form-control">
                    @error('start_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date de Fin -->
                <div class="mb-3">
                    <label for="end_date" class="form-label">Date de Fin</label>
                    <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $project->end_date->format('Y-m-d')) }}" class="form-control">
                    @error('end_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Budget -->
                <div class="mb-3">
                    <label for="budget" class="form-label">Budget</label>
                    <input type="number" id="budget" name="budget" value="{{ old('budget', $project->budget) }}" class="form-control" step="0.01">
                    @error('budget')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Statut du Projet -->
                <div class="mb-3">
                    <label for="status" class="form-label">Statut</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="actif" {{ old('status', $project->status) == 'actif' ? 'selected' : '' }}>Actif</option>
                        <option value="suspendu" {{ old('status', $project->status) == 'suspendu' ? 'selected' : '' }}>Suspendu</option>
                        <option value="terminer" {{ old('status', $project->status) == 'terminer' ? 'selected' : '' }}>Terminé</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Chef de Projet -->
                <div class="mb-3">
                    <label for="project_manager_id" class="form-label">Chef de Projet</label>
                    <select id="project_manager_id" name="project_manager_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('project_manager_id', $project->project_manager_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('project_manager_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Membres de l'Équipe -->
                <div class="mb-3">
                    <label for="team_members" class="form-label">Membres de l'Équipe</label>
                    <select id="team_members" name="team_members[]" class="form-control" multiple>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ in_array($user->id, old('team_members', $projectMembers)) ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                    
                    </select>
                    <small class="form-text">Maintenez la touche Ctrl (Windows) ou Cmd (Mac) pour sélectionner plusieurs membres.</small>
                    @error('team_members')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bouton de Soumission -->
                <button type="submit" class="btn btn-primary">Sauvegarder les Modifications</button>
            </form>
        </div>
    </div>
</div>

<footer class="footer">
    <span>&copy; 2024 Application de Gestion de Projets. Tous droits réservés.</span>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
