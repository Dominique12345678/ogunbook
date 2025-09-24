<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription | OgunBook</title>

    <!-- Lien CSS -->
    <link rel="stylesheet" href="{{ asset('css/registeruser.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('image/faviconOB.png') }}" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
</head>
<body>

    <div class="container">

        <!-- Panneau gauche : image animée -->
        <div class="left-panel">
            <img src="{{ asset('image/OG3.png') }}" alt="OgunBook">
        </div>

        <!-- Panneau droit : formulaire -->
        <div class="right-panel">
            <form id="signupForm" class="signup-form" method="POST" action="{{ route('registeruser.store') }}">
                @csrf

                <h2>Créer un compte</h2>

                <!-- Erreurs Laravel -->
                @if ($errors->any())
                    <div style="color: red; margin-bottom: 1rem;">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Nom et Prénom -->
                <div class="row double">
                    <div class="field">
                        <label for="nom_utilisateurs">Nom</label>
                        <input type="text" id="nom_utilisateurs" name="nom_utilisateurs" value="{{ old('nom_utilisateurs') }}" autocomplete="off" required>
                    </div>
                    <div class="field">
                        <label for="prenoms_utilisateurs">Prénom(s)</label>
                        <input type="text" id="prenoms_utilisateurs" name="prenoms_utilisateurs" value="{{ old('prenoms_utilisateurs') }}" autocomplete="off" required>
                    </div>
                </div>

                <!-- Pseudo -->
                <div class="field">
                    <label for="pseudo_utilisateurs">Pseudo</label>
                    <input type="text" id="pseudo_utilisateurs" name="pseudo_utilisateurs" value="{{ old('pseudo_utilisateurs') }}" autocomplete="off" required>
                </div>

                <!-- Date de naissance et Genre -->
                <div class="row double">
                    <div class="field">
                        <label for="date_de_naissance_utilisateur">Date de naissance</label>
                        <input type="date" id="date_de_naissance_utilisateur" name="date_de_naissance_utilisateur" value="{{ old('date_de_naissance_utilisateur') }}" autocomplete="off" required>
                    </div>
                    <div class="field">
                        <label for="genre_utilisateur">Genre</label>
                        <select id="genre_utilisateur" name="genre_utilisateur" required>
                            <option value="">-- Sélectionnez --</option>
                            <option value="Homme" {{ old('genre_utilisateur') == 'Homme' ? 'selected' : '' }}>Homme</option>
                            <option value="Femme" {{ old('genre_utilisateur') == 'Femme' ? 'selected' : '' }}>Femme</option>
                            <option value="Ne pas préciser" {{ old('genre_utilisateur') == 'Ne pas préciser' ? 'selected' : '' }}>Ne pas préciser</option>
                        </select>
                    </div>
                </div>

                <!-- Email et Téléphone -->
                <div class="row double">
                    <div class="field">
                        <label for="email_utilisateur">Email</label>
                        <input type="email" id="email_utilisateur" name="email_utilisateur" value="{{ old('email_utilisateur') }}" autocomplete="off" required>
                    </div>
                    <div class="field">
                        <label for="num_tel_utilisateur">Téléphone</label>
                        <input type="tel" id="num_tel_utilisateur" name="num_tel_utilisateur" value="{{ old('num_tel_utilisateur') }}" autocomplete="off" required>
                    </div>
                </div>

                <!-- Mot de passe -->
                <div class="field password-field">
                    <label for="mot_de_passe_utilisateur">Mot de passe</label>
                    <div class="password-wrapper">
                        <input type="password" id="mot_de_passe_utilisateur" name="mot_de_passe_utilisateur" autocomplete="off" required>
                        <img src="{{ asset('image/eyeoff-icon.svg') }}" alt="Afficher mot de passe" class="eye-icon" id="togglePassword">
                    </div>
                    <p class="password-hint">Utilisez au moins 8 caractères, dont une majuscule, une minuscule et un chiffre.</p>
                    <div class="password-strength">
                        <div class="strength-bar" id="strengthBar"></div>
                    </div>
                    <span class="strength-text" id="strengthText"></span>
                </div>

                <!-- Confirmation mot de passe -->
                <div class="field password-field">
                    <label for="mot_de_passe_utilisateur_confirmation">Confirmer le mot de passe</label>
                    <div class="password-wrapper">
                        <input type="password" id="mot_de_passe_utilisateur_confirmation" name="mot_de_passe_utilisateur_confirmation" autocomplete="off" required>
                        <img src="{{ asset('image/eyeoff-icon.svg') }}" alt="Afficher" class="eye-icon" id="toggleConfirm">
                    </div>
                    <p class="error-message" id="matchError"></p>
                </div>

                <!-- Conditions -->
                <div class="field checkbox">
                    <input type="checkbox" id="terms" class="check" required>
                    <p>
                        J’accepte les <a href="{{ asset('TermsofUse.html') }}">Conditions d’utilisation</a> et la <a href="{{ asset('PrivacyPolicy.html') }}">Politique de confidentialité</a>
                    </p>
                </div>

                <!-- Bouton principal -->
                <button type="submit" class="btn-primary">S’inscrire</button>

                <!-- Séparateur -->
                <div class="separator">S’inscrire avec</div>

                <!-- Boutons sociaux -->
                <div class="social-buttons">
                    <a href="{{ route('auth.google.redirect', ['role' => 'user']) }}" class="btn btn-google">
                        <i class="fab fa-google"></i> Se connecter avec Google
                    </a>
                    <button type="button" class="facebook">
                        <i class="fab fa-facebook"></i> Facebook
                    </button>
                </div>

                <!-- Lien vers connexion -->
                <p class="signin-link">
                    Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a>
                </p>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('script/registeruser.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
</body>
</html>
