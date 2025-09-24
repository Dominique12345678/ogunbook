<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion Créateur | OgunBook</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('image/faviconOB.png') }}" type="image/x-icon" />

    <!-- Font Awesome (pour les icônes) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Votre CSS -->
    <link rel="stylesheet" href="{{ asset('css/logincreator.css') }}" />
</head>
<body>

    <!-- Conteneur principal qui centre tout le contenu -->
    <div class="main-container">

        <main class="login-card">

            <!-- En-tête de la carte de connexion -->
            <header class="login-header">
                <h1>Heureux de te revoir</h1>
                <p>Connecte-toi pour accéder à ton espace créateur.</p>
            </header>

            <!-- Formulaire de connexion -->
            <form action="{{ route('creator.login') }}" method="POST" class="login-form">
                @csrf

                <!-- Affichage des erreurs Laravel -->
                @if ($errors->any())
                    <div class="error-container">
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    </div>
                @endif

                <!-- Champ Email -->
                <div class="form-group">
                    <label for="identifiant">Email</label>
                    <input type="email" id="identifiant" name="identifiant" value="{{ old('identifiant') }}" required autocomplete="email">
                </div>

                <!-- Champ Mot de passe -->
                <div class="form-group">
                    <label for="motdepasse">Mot de passe</label>
                    <div class="password-wrapper">
                        <input type="password" id="motdepasse" name="motdepasse" required autocomplete="current-password">
                        <i class="fa-solid fa-eye-slash eye-icon" id="togglePassword"></i>
                    </div>
                </div>

                <!-- Options supplémentaires -->
                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Rester connecté</label>
                    </div>
                    <a href="#" class="forgot-password-link">Mot de passe oublié ?</a>
                </div>

                <!-- Bouton de soumission -->
                <button type="submit" class="btn-submit">Continuer</button>

                <!-- Séparateur "Ou" -->
                <div class="separator">
                    <span>Ou</span>
                </div>

                <!-- Boutons de connexion via réseaux sociaux -->
                <div class="social-login-buttons">
                    <a href="{{ route('auth.google.redirect', ['role' => 'creator']) }}" class="social-btn google-btn">
                        <i class="fab fa-google"></i>
                        <span>Continuer avec Google</span>
                    </a>
                    <button type="button" class="social-btn facebook-btn">
                        <i class="fab fa-facebook-f"></i>
                        <span>Continuer avec Facebook</span>
                    </button>
                </div>

                <!-- Lien vers la page d'inscription -->
                <p class="redirect-link">
                    Vous n'avez pas de compte ? <a href="{{ route('registercreator') }}">Inscrivez-vous</a>
                </p>
            </form>

            <!-- Pied de page avec les liens légaux -->
            <footer class="login-footer">
                <a href="{{ asset('TermsofUse.html') }}">Conditions d’utilisation</a>
                <span>&bull;</span>
                <a href="{{ asset('PrivacyPolicy.html') }}">Politique de confidentialité</a>
            </footer>

        </main>

    </div>

    <!-- Script JS -->
    <script src="{{ asset('script/login.js') }}"></script>
</body>
</html>