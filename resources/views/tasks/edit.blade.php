<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Tâche</title>
    <!-- Inclure votre fichier CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Inclure Bootstrap pour les styles de base -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Barre de navigation latérale -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('image/logoP.png') }}" alt="Logo">
        </div>
        <ul>
            <li>
                <a href="javascript:history.back()">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
            </li>
            <!-- Ajoutez ici d'autres liens de navigation si nécessaire -->
        </ul>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        <div class="container mt-5">
            <h1>Modifier la Tâche</h1>
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nom de la Tâche</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Statut</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="à faire" {{ $task->status == 'à faire' ? 'selected' : '' }}>À faire</option>
                        <option value="en cours" {{ $task->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                        <option value="terminé" {{ $task->status == 'terminé' ? 'selected' : '' }}>Terminé</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="project_id">Projet</label>
                    <select name="project_id" id="project_id" class="form-control" required>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="user_id">Utilisateur</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>

    <!-- Inclure Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
