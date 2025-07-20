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

    <!-- CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
</head>

<body>

    <div class="left-section">
        <img src="{{ asset('image/ogunboys.png') }}" alt="Comics Hero">
    </div>

    <div class="right-section">

        <form method="POST" action="{{ route('loginuser') }}" class="login-container" id="loginForm">
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
                <button type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24px" height="24px">
                        <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303..."/>
                        <!-- (raccourci pour lisibilité, laisse ton SVG complet ici) -->
                    </svg>
                    Google
                </button>
                <button type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24px" height="24px">
                        <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19..."/>
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
