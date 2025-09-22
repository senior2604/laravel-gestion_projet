<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Gestion de Projets</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        }
        
        .btn:hover {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.35);
        }
        
        .btn:active {
            transform: translateY(0);
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
        
        .password-strength {
            height: 4px;
            background-color: var(--gray-border);
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: var(--transition);
            border-radius: 2px;
        }
        
        .password-strength.weak .password-strength-bar {
            background-color: #e74c3c;
            width: 33%;
        }
        
        .password-strength.medium .password-strength-bar {
            background-color: #f39c12;
            width: 66%;
        }
        
        .password-strength.strong .password-strength-bar {
            background-color: #2ecc71;
            width: 100%;
        }
        
        .password-hints {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-top: 0.5rem;
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
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <div class="logo-circle">P</div>
        </div>
        
        <div class="form-container">
            <h1>Créer un compte</h1>
            
            <form action="{{ url('register') }}" method="POST" id="registerForm">
                @csrf
                
                <div class="form-group">
                    <label for="name">Nom complet</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                    <div class="error-message" id="nameError">Veuillez entrer votre nom complet</div>
                </div>
                
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    <div class="error-message" id="emailError">Veuillez entrer une adresse email valide</div>
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="password-container">
                        <input type="password" name="password" id="password" class="form-control" required>
                        <button type="button" class="toggle-password" id="togglePassword">Afficher</button>
                    </div>
                    <div class="password-strength" id="passwordStrength">
                        <div class="password-strength-bar"></div>
                    </div>
                    <div class="password-hints" id="passwordHints">
                        Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.
                    </div>
                    <div class="error-message" id="passwordError">Le mot de passe ne respecte pas les critères de sécurité</div>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <div class="password-container">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        <button type="button" class="toggle-password" id="togglePasswordConfirmation">Afficher</button>
                    </div>
                    <div class="error-message" id="passwordConfirmationError">Les mots de passe ne correspondent pas</div>
                </div>
                
                <button type="submit" class="btn">S'inscrire</button>
            </form>
            
            <div class="form-footer">
                <div class="text-center">
                    <p>Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fonctionnalité d'affichage/masquage du mot de passe
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? 'Afficher' : 'Masquer';
        });
        
        document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
            const passwordInput = document.getElementById('password_confirmation');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? 'Afficher' : 'Masquer';
        });
        
        // Validation du mot de passe en temps réel
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.querySelector('.password-strength-bar');
            const strengthContainer = document.getElementById('passwordStrength');
            const hints = document.getElementById('passwordHints');
            
            // Réinitialiser les classes
            strengthContainer.classList.remove('weak', 'medium', 'strong');
            
            // Calculer la force du mot de passe
            let strength = 0;
            let feedback = [];
            
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            // Mettre à jour l'affichage de la force
            if (strength <= 2) {
                strengthContainer.classList.add('weak');
                hints.textContent = "Mot de passe faible - ajoutez des majuscules, chiffres et caractères spéciaux";
            } else if (strength <= 4) {
                strengthContainer.classList.add('medium');
                hints.textContent = "Mot de passe moyen - vous pouvez l'améliorer";
            } else {
                strengthContainer.classList.add('strong');
                hints.textContent = "Mot de passe fort - excellent!";
            }
            
            // Vérifier la correspondance des mots de passe
            const confirmation = document.getElementById('password_confirmation').value;
            if (confirmation && password !== confirmation) {
                document.getElementById('passwordConfirmationError').style.display = 'block';
                document.getElementById('password_confirmation').classList.add('error');
            } else {
                document.getElementById('passwordConfirmationError').style.display = 'none';
                document.getElementById('password_confirmation').classList.remove('error');
            }
        });
        
        // Validation de la confirmation du mot de passe
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmation = this.value;
            
            if (confirmation && password !== confirmation) {
                document.getElementById('passwordConfirmationError').style.display = 'block';
                this.classList.add('error');
            } else {
                document.getElementById('passwordConfirmationError').style.display = 'none';
                this.classList.remove('error');
            }
        });
        
        // Validation du formulaire avant soumission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validation du nom
            const name = document.getElementById('name').value.trim();
            if (name.length < 2) {
                document.getElementById('nameError').style.display = 'block';
                document.getElementById('name').classList.add('error');
                isValid = false;
            } else {
                document.getElementById('nameError').style.display = 'none';
                document.getElementById('name').classList.remove('error');
            }
            
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
            if (password.length < 8 || 
                !/[A-Z]/.test(password) || 
                !/[a-z]/.test(password) || 
                !/[0-9]/.test(password) || 
                !/[^A-Za-z0-9]/.test(password)) {
                document.getElementById('passwordError').style.display = 'block';
                document.getElementById('password').classList.add('error');
                isValid = false;
            } else {
                document.getElementById('passwordError').style.display = 'none';
                document.getElementById('password').classList.remove('error');
            }
            
            // Validation de la confirmation
            const confirmation = document.getElementById('password_confirmation').value;
            if (password !== confirmation) {
                document.getElementById('passwordConfirmationError').style.display = 'block';
                document.getElementById('password_confirmation').classList.add('error');
                isValid = false;
            } else {
                document.getElementById('passwordConfirmationError').style.display = 'none';
                document.getElementById('password_confirmation').classList.remove('error');
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
        
        // Animation d'entrée pour les champs du formulaire
        document.querySelectorAll('.form-group').forEach((group, index) => {
            group.style.animation = `fadeInUp 0.6s ease-out ${index * 0.1}s both`;
        });
    </script>
</body>
</html>