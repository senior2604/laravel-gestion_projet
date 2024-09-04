<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('image/logoP.png') }}" alt="Logo">
    </div>
    <ul>
        <li><a class="active" href="{{ route('projects.index') }}">Projets</a></li>
        <li><a href="{{ route('tasks.index') }}">Tâches</a></li>
        <li><a href="{{ route('statistics.index') }}">Statistiques</a></li>
        <li><a href="{{ url('/calendar') }}" class="{{ request()->is('calendar') ? 'active' : '' }}">Calendrier</a></li>
        <li><a href="{{ route('reports.create') }}" class="{{ request()->routeIs('reports.*') ? 'active' : '' }}">Rapports</a></li>
        <li><a href="javascript:history.go(-1)">Retour</a>
    </ul>
</div>

<div class="main-content">
    <h1>Tableau de Bord</h1>

    <!-- Section Utilisateurs Validés -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Utilisateurs Validés</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($validatedUsers as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('users.updateRole', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role" class="form-control" onchange="this.form.submit()">
                                        <option value="inconnu" {{ $user->role == 'inconnu' ? 'selected' : '' }}>Inconnu</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                                        <option value="chef_de_projet" {{ $user->role == 'chef_de_projet' ? 'selected' : '' }}>Chef de Projet</option>
                                        <option value="membre" {{ $user->role == 'membre' ? 'selected' : '' }}>Membre</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Section Utilisateurs Non Validés -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Utilisateurs Non Validés</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendingUsers as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('users.validate', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Valider</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
