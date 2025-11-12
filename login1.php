<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - StackCore</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        /* background: linear-gradient(135deg, #3B3B1A 0%, #8FAA83 100%); */
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-container {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        position: relative;
        overflow: hidden;
    }

    .logo {
        text-align: center;
        margin-bottom: 2rem;
    }

    .logo h1 {
        color: #333;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .logo p {
        color: #666;
        font-size: 0.9rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #333;
        font-weight: 500;
    }

    .form-group input {
        width: 100%;
        padding: 0.8rem;
        border: 2px solid #e1e5e9;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    .form-group input:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-group input.error {
        border-color: #e74c3c;
        background: #fdf2f2;
    }

    .error-message {
        color: #e74c3c;
        font-size: 0.8rem;
        margin-top: 0.25rem;
        display: none;
    }

    .error-message.show {
        display: block;
    }

    .password-toggle {
        position: absolute;
        right: 10px;
        top: 35px;
        cursor: pointer;
        color: #666;
        font-size: 1.2rem;
    }

    .signup-link {
        text-align: center;
        color: #666;
        font-size: 0.95rem;
    }

    .signup-link a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .signup-link a:hover {
        color: #5a6fd8;
        text-decoration: underline;
    }

    .login-btn {
        width: 100%;
        padding: 0.8rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    .login-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none;
    }

    .spinner {
        display: none;
        width: 20px;
        height: 20px;
        border: 2px solid #ffffff;
        border-top: 2px solid transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-right: 10px;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .alert {
        padding: 0.8rem;
        border-radius: 8px;
        margin-bottom: 1rem;
        display: none;
    }

    .alert.error {
        background: #fdf2f2;
        color: #e74c3c;
        border: 1px solid #fadbd8;
    }

    .alert.success {
        background: #f0fff4;
        color: #27ae60;
        border: 1px solid #d4edda;
    }

    .alert.show {
        display: block;
    }

    .forgot-password {
        text-align: center;
        margin-top: 1rem;
    }

    .forgot-password a {
        color: #667eea;
        text-decoration: none;
        font-size: 0.9rem;
    }

    .forgot-password a:hover {
        text-decoration: underline;
    }

    body>div {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 100%;
        max-width: 900px;
        min-height: 600px;
        display: flex;
        animation: slideIn 0.8s ease-out;
    }

    .login-left {
        flex: 1;
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        padding: 60px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .login-left::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: repeating-linear-gradient(45deg,
                transparent,
                transparent 2px,
                rgba(255, 255, 255, 0.1) 2px,
                rgba(255, 255, 255, 0.1) 4px);
        animation: float 20s linear infinite;
    }

    .login-left h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
        font-weight: 700;
        position: relative;
        z-index: 1;
    }

    .login-left p {
        font-size: 1.1rem;
        line-height: 1.6;
        opacity: 0.9;
        position: relative;
        z-index: 1;
    }

    @keyframes float {
        0% {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        100% {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }

    @media (max-width: 480px) {
        .login-container {
            margin: 1rem;
            padding: 1.5rem;
        }
    }
    </style>
</head>

<body>
    <div>
        <div class="login-left">
            <h1>Bienvenue</h1>
            <p>Connectez-vous à votre espace professionnel pour accéder à notre catalogue de produits, gérer vos
                commandes et bénéficier de tarifs préférentiels.</p>
        </div>
        <div class="login-container">
            <div class="logo">
                <h1>StackCore</h1>
                <p>Connexion à votre espace</p>
            </div>

            <div id="alert" class="alert"></div>

            <form id="loginForm" method="POST" action="login_process.php">
                <div class="form-group">
                    <label for="email">Adresse email professionnelle</label>
                    <input type="email" id="email" name="email" required>
                    <div class="error-message" id="emailError"></div>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                    <span class="password-toggle" onclick="togglePassword()">👁️</span>
                    <div class="error-message" id="passwordError"></div>
                </div>

                <button type="submit" class="login-btn" id="loginBtn">
                    <span class="spinner" id="spinner"></span>
                    <span id="btnText">Se connecter</span>
                </button>
            </form>
            <div class="signup-link">
                Pas encore de compte ? <a href="registration.php" onclick="showSignup()">Créer un compte
                    entreprise</a>
            </div>
            <div class="forgot-password">
                <a href="forgot_password.php">Mot de passe oublié ?</a>
            </div>
        </div>
    </div>

    <script>
    const loginForm = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const loginBtn = document.getElementById('loginBtn');
    const spinner = document.getElementById('spinner');
    const btnText = document.getElementById('btnText');
    const alert = document.getElementById('alert');

    // Validation côté client
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validatePassword(password) {
        return password.length >= 6;
    }

    function showError(inputId, message) {
        const input = document.getElementById(inputId);
        const errorDiv = document.getElementById(inputId + 'Error');

        input.classList.add('error');
        errorDiv.textContent = message;
        errorDiv.classList.add('show');
    }

    function clearError(inputId) {
        const input = document.getElementById(inputId);
        const errorDiv = document.getElementById(inputId + 'Error');

        input.classList.remove('error');
        errorDiv.classList.remove('show');
    }

    function showAlert(message, type) {
        alert.textContent = message;
        alert.className = `alert ${type} show`;

        setTimeout(() => {
            alert.classList.remove('show');
        }, 5000);
    }

    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.querySelector('.password-toggle');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggle.textContent = '🙈';
        } else {
            passwordInput.type = 'password';
            passwordToggle.textContent = '👁️';
        }
    }

    // Validation en temps réel
    emailInput.addEventListener('input', function() {
        if (this.value && validateEmail(this.value)) {
            clearError('email');
        }
    });

    passwordInput.addEventListener('input', function() {
        if (this.value && validatePassword(this.value)) {
            clearError('password');
        }
    });

    // Soumission du formulaire
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();

        let isValid = true;

        // Clear previous errors
        clearError('email');
        clearError('password');

        // Validate email
        if (!emailInput.value) {
            showError('email', 'L\'email est requis');
            isValid = false;
        } else if (!validateEmail(emailInput.value)) {
            showError('email', 'Format d\'email invalide');
            isValid = false;
        }

        // Validate password
        if (!passwordInput.value) {
            showError('password', 'Le mot de passe est requis');
            isValid = false;
        } else if (!validatePassword(passwordInput.value)) {
            showError('password', 'Le mot de passe doit contenir au moins 6 caractères');
            isValid = false;
        }

        if (!isValid) {
            return;
        }

        // Show loading state
        loginBtn.disabled = true;
        spinner.style.display = 'inline-block';
        btnText.textContent = 'Connexion...';

        // Simulate API call (replace with actual AJAX call)
        const formData = new FormData(loginForm);

        fetch('login_process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert('Connexion réussie ! Redirection...', 'success');
                    setTimeout(() => {
                        window.location.href = data.redirect || 'index.php';
                    }, 1500);
                } else {
                    showAlert(data.message || 'Erreur de connexion', 'error');
                }
            })
            .catch(error => {
                showAlert('Erreur de connexion. Veuillez réessayer.', 'error');
                console.error('Error:', error);
            })
            .finally(() => {
                // Reset button state
                loginBtn.disabled = false;
                spinner.style.display = 'none';
                btnText.textContent = 'Se connecter';
            });
    });

    // Auto-focus on email input
    emailInput.focus();
    </script>
</body>

</html>