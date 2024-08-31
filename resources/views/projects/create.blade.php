<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Projet</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('image/logoP.png') }}" alt="Logo">
        </div>
        <ul>
            <li><a href="{{ route('projects.index') }}">Retour</a></li>
            <li><a href="#">Calendrier</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Créer un Nouveau Projet</h1>
        <div class="dashboard-container">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf

                <!-- Nom du Projet -->
                <div class="form-group">
                    <label for="name" class="form-label">Nom du Projet</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Statut du Projet -->
                <div class="form-group">
                    <label for="status" class="form-label">Statut</label>
                    <select id="status" name="status" class="form-select" required>
                        <option value="actif">Actif</option>
                        <option value="suspendu">Suspendu</option>
                        <option value="terminer">Terminé</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description du Projet -->
                <div class="form-group">
                    <label for="description" class="form-label">Description du Projet</label>
                    <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <!-- Date de Début -->
                    <div class="form-group">
                        <label for="start_date" class="form-label">Date de Début</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" required>
                        @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Date de Fin -->
                    <div class="form-group">
                        <label for="end_date" class="form-label">Date de Fin</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                        @error('end_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Budget du Projet -->
                <div class="form-group">
                    <label for="budget" class="form-label">Budget</label>
                    <input type="number" id="budget" name="budget" class="form-control" step="0.01" required>
                    @error('budget')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Chef de Projet -->
                <div class="form-group">
                    <label for="project_manager" class="form-label">Chef de Projet</label>
                    <select id="project_manager" name="project_manager" class="form-select" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('project_manager')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Membres de l'Équipe -->
                <div class="form-group">
                    <label for="team_members" class="form-label">Membres de l'Équipe</label>
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

                <!-- Bouton de Soumission -->
                <button type="submit" class="btn btn-primary">Créer le Projet</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} Application de Gestion de Projets</p>
    </footer>
</body>
</html>
