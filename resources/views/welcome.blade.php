<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur la Gestion de Projets</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --text: #333;
            --text-light: #6c757d;
            --white: #ffffff;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body, html {
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .welcome-container {
            text-align: center;
            background-color: var(--white);
            padding: 3rem 2.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 500px;
            position: relative;
            overflow: hidden;
            transition: var(--transition);
        }
        
        .welcome-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        
        .welcome-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--primary-light));
        }
        
        .logo-container {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .logo-container img {
            max-width: 100px;
            height: auto;
            margin-bottom: 1rem;
            transition: var(--transition);
        }
        
        .logo-container:hover img {
            transform: scale(1.05);
        }
        
        .logo-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-light), var(--secondary));
            margin: 0 auto 1.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 3.5rem;
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .welcome-container h1 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--text);
            font-weight: 600;
            line-height: 1.4;
        }
        
        .welcome-container p {
            font-size: 1rem;
            margin-bottom: 2.5rem;
            color: var(--text-light);
            line-height: 1.6;
        }
        
        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.9rem 1.5rem;
            font-size: 1rem;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            font-weight: 500;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .btn-login {
            background-color: var(--primary);
            color: var(--white);
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.25);
        }
        
        .btn-login:hover {
            background-color: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.35);
        }
        
        .btn-register {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        
        .btn-register:hover {
            background-color: rgba(67, 97, 238, 0.05);
            transform: translateY(-2px);
        }
        
        /* Animation pour les boutons */
        .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }
        
        .btn:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }
        
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .welcome-container {
                padding: 2.5rem 1.5rem;
            }
            
            .logo-circle {
                width: 100px;
                height: 100px;
                font-size: 2.8rem;
            }
            
            .welcome-container h1 {
                font-size: 1.5rem;
            }
            
            .btn-container {
                flex-direction: column;
            }
        }
        
        /* Animation d'entrée */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .welcome-container {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="logo-container">
            <div class="logo-circle">P</div>
        </div>
        <h1>Votre application de gestion de projets</h1>
        <p>Connectez-vous si vous avez déjà un compte ou créez un nouveau compte pour commencer à gérer vos projets efficacement.</p>
        <div class="btn-container">
            <a href="{{ route('login') }}" class="btn btn-login">Se connecter</a>
            <a href="{{ route('register') }}" class="btn btn-register">Créer un compte</a>
        </div>
    </div>

    <script>
        // Ajout d'un effet de ripple sur les boutons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const x = e.clientX - e.target.getBoundingClientRect().left;
                const y = e.clientY - e.target.getBoundingClientRect().top;
                
                const ripple = document.createElement('span');
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    </script>
</body>
</html>