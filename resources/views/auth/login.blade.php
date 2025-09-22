<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Gestion de Projets</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --text: #333;
            --text-light: #6c757d;
            --white: #ffffff;
            --gray-light: #f8f9fa;
            --gray-border: #e1e5eb;
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
        
        .container {
            width: 100%;
            max-width: 450px;
            background-color: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
        }
        
        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        
        .logo-container {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            padding: 2rem;
            text-align: center;
            position: relative;
        }
        
        .logo-container::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, var(--success), var(--primary-light));
        }
        
        .logo-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: var(--white);
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--primary);
            font-size: 2.5rem;
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .form-container {
            padding: 2.5rem;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--text);
            font-weight: 600;
            font-size: 1.8rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text);
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .form-control {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 2px solid var(--gray-border);
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--gray-light);
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background-color: var(--white);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }
        
        .password-container {
            position: relative;
        }
        
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            font-size: 0.9rem;
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input {
            margin-right: 0.5rem;
        }
        
        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
        }
        
        .forgot-password:hover {
            color: var(--secondary);
            text-decoration: underline;
        }
        
        .btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: var(--white);
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.25);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn:hover {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.35);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .btn i {
            font-size: 1.1rem;
        }
        
        .text-center {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .text-center a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .text-center a:hover {
            color: var(--secondary);
            text-decoration: underline;
        }
        
        .form-footer {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-border);
        }
        
        .social-login {
            margin-top: 1.5rem;
        }
        
        .social-login p {
            text-align: center;
            margin-bottom: 1rem;
            color: var(--text-light);
            font-size: 0.9rem;
            position: relative;
        }
        
        .social-login p::before,
        .social-login p::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background-color: var(--gray-border);
        }
        
        .social-login p::before {
            left: 0;
        }
        
        .social-login p::after {
            right: 0;
        }
        
        .social-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .social-btn {
            flex: 1;
            padding: 0.8rem;
            border: 1px solid var(--gray-border);
            border-radius: 8px;
            background-color: var(--white);
            color: var(--text);
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }
        
        .social-btn:hover {
            background-color: var(--gray-light);
            transform: translateY(-2px);
        }
        
        .social-btn.google {
            color: #DB4437;
        }
        
        .social-btn.facebook {
            color: #4267B2;
        }
        
        .error-message {
            color: #e74c3c;
            font-size: 0.8rem;
            margin-top: 0.3rem;
            display: none;
        }
        
        .form-control.error {
            border-color: #e74c3c;
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
        
        .container {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .container {
                max-width: 100%;
            }
            
            .form-container {
                padding: 2rem 1.5rem;
            }
            
            h1 {
                font-size: 1.5rem;
            }
            
            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .social-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <div class="logo-circle">P</div>
        </div>
        
        <div class="form-container">
            <h1>Connexion</h1>
            
            <form action="{{ url('login') }}" method="POST" id="loginForm">
                @csrf
                
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    <div class="error-message" id="emailError">Veuillez entrer une adresse email valide</div>
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="password-container">
                        <input type="password" name="password" id="password" class="form-control" required>
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    <div class="error-message" id="passwordError">Veuillez entrer votre mot de passe</div>
                </div>
                
                
                
                <button type="submit" class="btn">
                    <i class="fas fa-sign-in-alt"></i>
                    Se connecter
                </button>
            </form>
            
            
            
            <div class="form-footer">
                <div class="text-center">
                    <p>Pas encore inscrit ? <a href="{{ route('register') }}">Créer un compte</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fonctionnalité d'affichage/masquage du mot de passe
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            const icon = this.querySelector('i');
            
            passwordInput.setAttribute('type', type);
            
            if (type === 'password') {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });
        
        // Validation du formulaire avant soumission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validation de l'email
            const email = document.getElementById('email').value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('emailError').style.display = 'block';
                document.getElementById('email').classList.add('error');
                isValid = false;
            } else {
                document.getElementById('emailError').style.display = 'none';
                document.getElementById('email').classList.remove('error');
            }
            
            // Validation du mot de passe
            const password = document.getElementById('password').value;
            if (password.length < 1) {
                document.getElementById('passwordError').style.display = 'block';
                document.getElementById('password').classList.add('error');
                isValid = false;
            } else {
                document.getElementById('passwordError').style.display = 'none';
                document.getElementById('password').classList.remove('error');
            }
            
            if (!isValid) {
                e.preventDefault();
                
                // Animation d'erreur
                const container = document.querySelector('.container');
                container.style.animation = 'none';
                setTimeout(() => {
                    container.style.animation = 'shake 0.5s ease-in-out';
                }, 10);
                
                // Définir l'animation de secousse
                const style = document.createElement('style');
                style.textContent = `
                    @keyframes shake {
                        0%, 100% { transform: translateX(0); }
                        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                        20%, 40%, 60%, 80% { transform: translateX(5px); }
                    }
                `;
                document.head.appendChild(style);
                
                setTimeout(() => {
                    container.style.animation = '';
                    document.head.removeChild(style);
                }, 500);
            }
        });
        
        // Animation d'entrée pour les champs du formulaire
        document.querySelectorAll('.form-group').forEach((group, index) => {
            group.style.animation = `fadeInUp 0.6s ease-out ${index * 0.1}s both`;
        });
        
        // Simulation de connexion sociale (à remplacer par la vraie logique)
        document.querySelectorAll('.social-btn').forEach(button => {
            button.addEventListener('click', function() {
                const provider = this.classList.contains('google') ? 'Google' : 'Facebook';
                alert(`Connexion avec ${provider} - Cette fonctionnalité serait implémentée ici`);
            });
        });
        
        // Simulation de mot de passe oublié
        document.querySelector('.forgot-password').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Fonctionnalité de réinitialisation du mot de passe - À implémenter');
        });
    </script>
</body>
</html>