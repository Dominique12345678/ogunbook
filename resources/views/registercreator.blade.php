<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Créateur | OgunBook</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('image/faviconOB.png') }}" type="image/x-icon" />

    <!-- Bootstrap CSS (si vous l'utilisez) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (pour les icônes) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('css/registercreator.css') }}" />
</head>

<body>
    <div class="container-fluid d-flex align-items-center justify-content-center min-vh-100">
        <main class="register-container">

            <header class="text-center mb-4">
                <h1>Rejoignez l’univers créatif d’OgunBook</h1>
            </header>

            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('registercreator.store') }}" method="POST" class="register-form p-4 bg-glass rounded-4">
                @csrf

                <!-- Nom, Prénom, Nom de créateur -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nomCreateur">Votre nom de créateur</label>
                            <input type="text" class="form-control" id="nomCreateur" name="nomCreateur" value="{{ old('nomCreateur') }}" required>
                        </div>
                    </div>
                </div>

                <!-- Date de naissance et Genre -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dateNaissance">Date de naissance</label>
                            <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" value="{{ old('dateNaissance') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <select class="form-select" id="genre" name="genre" required>
                                <option value="">-- Sélectionnez --</option>
                                <option value="homme" {{ old('genre') == 'homme' ? 'selected' : '' }}>Homme</option>
                                <option value="femme" {{ old('genre') == 'femme' ? 'selected' : '' }}>Femme</option>
                                <option value="pas préciser" {{ old('genre') == 'pas préciser' ? 'selected' : '' }}>Ne pas préciser</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Type de créateur -->
                <div class="form-group mb-3">
                    <label for="typeCreateur">Type de créateur</label>
                    <select class="form-select" id="typeCreateur" name="typeCreateur" required>
                        <option value="">-- Sélectionnez --</option>
                        <option value="independant" {{ old('typeCreateur') == 'independant' ? 'selected' : '' }}>Créateur indépendant</option>
                        <option value="maison" {{ old('typeCreateur') == 'maison' ? 'selected' : '' }}>Créateur pour une maison</option>
                        <option value="ogun" {{ old('typeCreateur') == 'ogun' ? 'selected' : '' }}>Créateur d'Ogun</option>
                    </select>
                </div>

                <!-- Email et Téléphone -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telephone">Téléphone</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                        </div>
                    </div>
                </div>

                <!-- Mot de passe -->
                <div class="form-group mb-3 password-group">
                    <label for="motdepasse">Mot de passe</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="motdepasse" name="motdepasse" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    <small class="form-text text-muted">Utilisez au moins 8 caractères, dont une majuscule, une minuscule et un chiffre.</small>
                </div>

                <!-- Confirmation mot de passe -->
                <div class="form-group mb-3">
                    <label for="confirmPassword">Confirmez le mot de passe</label>
                    <input type="password" class="form-control" id="confirmPassword" name="motdepasse_confirmation" required>
                    <p class="text-danger small mt-1" id="matchError"></p>
                </div>

                <!-- Conditions -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="conditions" name="conditions" required>
                    <label class="form-check-label" for="conditions">
                        J’accepte les <a href="{{ asset('TermsofUse.html') }}" class="text-decoration-underline">Conditions d’utilisation</a> et la <a href="{{ asset('PrivacyPolicy.html') }}" class="text-decoration-underline">Politique de confidentialité</a>
                    </label>
                </div>

                <!-- Bouton principal -->
                <button type="submit" class="btn btn-primary w-100 mb-3">S’inscrire</button>

                <!-- Séparateur -->
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <span class="separator">Ou s’inscrire avec</span>
                </div>

                <!-- Réseaux sociaux -->
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mb-3">
                    <a href="{{ route('auth.google.redirect', ['role' => 'creator']) }}" class="btn btn-google d-flex align-items-center justify-content-center">
                        <i class="fab fa-google me-2"></i> Google
                    </a>
                    <button type="button" class="btn btn-facebook d-flex align-items-center justify-content-center">
                        <i class="fab fa-facebook-f me-2"></i> Facebook
                    </button>
                </div>

                <!-- Lien vers connexion -->
                <p class="text-center">
                    Vous avez déjà un compte ?
                    <a href="{{ route('logincreator') }}" class="text-decoration-underline">Connectez-vous</a>
                </p>
            </form>
        </main>
    </div>

    <!-- Bootstrap JS (si vous l'utilisez) -->
    <script src="{{ asset('script/registercreator.js') }}"></script>
</body>
</html>