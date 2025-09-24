<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OgunBook Connexion</title>

    <!-- Lien CSS -->
    <link rel="stylesheet" href="{{ asset('css/loginuser.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('image/faviconOB.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">


    *
</head>

<body>

    <div class="left-section">
        <img src="{{ asset('image/ogunboys.png') }}" alt="Comics Hero">
    </div>

    <div class="right-section">
        <form method="POST" action="{{ route('login') }}" class="login-container" id="loginForm">
            @csrf

            <h2>Bienvenue</h2>

            {{-- Affichage des erreurs de validation --}}
            @if ($errors->any())
                <div style="color: red; margin-bottom: 1rem;">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" autocomplete="off" required value="{{ old('email') }}">
            </div>

            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="input-style" autocomplete="off" required>
                <img src="{{ asset('image/eyeoff-icon.svg') }}" alt="eyeoff" class="eye-icon" id="togglePassword" role="button" tabindex="0">
            </div>

            <div class="link-text" style="text-align: right; margin-bottom: 1rem;">
                <a class="link" href="#">Mot de passe oublié ?</a>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="stayLoggedIn">
                <label for="stayLoggedIn">Restez connecté</label>
            </div>

            <button type="submit">Continuer</button>

            <p class="link-text">Vous n'avez pas de compte ? <a class="link" href="{{ route('registeruser') }}">Inscription</a></p>

            <div class="separator">ou</div>

            <div class="social-buttons">
                <!-- Lien Google corrigé -->
               <a href="{{ route('auth.google.redirect', ['role' => 'user']) }}" class="btn btn-google">
    <i class="fab fa-google"></i> Se connecter avec Google
</a>
                <button type="button" class="social-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24px" height="24px">
                        <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"/><path fill="#fff" d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z"/>
                    </svg>
                    Facebook
                </button>
            </div>

            <div class="info-links">
                <a href="{{ asset('TermsofUse.html') }}">Conditions d’utilisation</a> |
                <a href="{{ asset('PrivacyPolicy.html') }}">Politique de confidentialité</a>
            </div>
        </form>
    </div>

    <script src="{{ asset('script.js') }}"></script>
</body>
</html>
