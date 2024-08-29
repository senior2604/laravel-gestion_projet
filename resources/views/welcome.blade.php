<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur la Gestion de Projets</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fc;
        }
        .welcome-container {
            text-align: center;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 50%; /* La page occupe la moitié de l'écran */
        }
        .welcome-container img {
            max-width: 120px; /* Ajuster la taille du logo */
            margin-bottom: 1.5rem;
        }
        .welcome-container h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #333;
        }
        .welcome-container p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #6c757d;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border-radius: 5px;
            margin: 0.5rem;
            text-decoration: none;
            display: inline-block;
        }
        .btn-login {
            background-color: #87CEEB; /* skyblue */
            color: white;
        }
        .btn-login:hover {
            background-color: #00BFFF; /* Deep skyblue */
        }
        .btn-register {
            background-color: #87CEEB; /* skyblue */
            color: white;
        }
        .btn-register:hover {
            background-color: #00BFFF; /* Deep skyblue */
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <img src="{{ asset('image/logoP.png') }}" alt="Logo">
        <h1> <h1>P</h1> <br> Votre application de gestion de Projets</h1>
        <p>Connectez-vous si vous avez déjà un compte ou créez un nouveau compte pour commencer à gérer vos projets.</p>
        <a href="{{ route('login') }}" class="btn btn-login">Se connecter</a>
        <a href="{{ route('register') }}" class="btn btn-register">Créer un compte</a>
    </div>
</body>
</html>
