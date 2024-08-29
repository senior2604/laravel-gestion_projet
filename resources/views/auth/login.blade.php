<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Inclure le fichier de style personnalisé -->
    <link rel="stylesheet" href="{{ asset('css/logreg.css') }}">
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <!-- Logo centré ici -->
            <img src="{{ asset('image/logoP.png') }}" alt="Logo">
        </div>
        <h1>Connexion</h1>
        <form action="{{ url('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
        <div class="text-center mt-3">
            <p>Pas encore inscrit ? <a href="{{ route('register') }}">Créer un compte</a></p>
        </div>
    </div>
</body>
</html>
