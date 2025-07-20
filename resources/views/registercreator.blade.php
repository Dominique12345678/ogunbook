<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creator Sign up</title>

  <!-- lien css -->
  <link rel="stylesheet" href="{{ asset('css/registercreator.css') }}">

  <!-- lien favicon -->
  <link rel="shortcut icon" href="{{ asset('image/faviconOB.png') }}" type="image/x-icon">

  <!-- autres liens -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
</head>

<body>

  <header>
    <h1>Rejoignez l’univers créatif d’OgunBook</h1>
  </header>

  <main>

    <form action="{{ route('registercreator.store') }}" method="POST" id="signupForm" class="signup-form">
      @csrf

      <section class="group">
        <div class="row">
          <label for="nom">Nom</label>
          <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>

          <label for="prenom">Prénom</label>
          <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required>

          <label for="nomCreateur">Votre nom de créateur</label>
          <input type="text" id="nomCreateur" name="nomCreateur" value="{{ old('nomCreateur') }}" required>
        </div>
      </section>

      <section class="group">
        <div class="row">
          <label for="dateNaissance">Date de naissance</label>
          <input type="date" id="dateNaissance" name="dateNaissance" value="{{ old('dateNaissance') }}" required>

          <label for="genre">Genre</label>
          <select id="genre" name="genre" required>
            <option value="">-- Sélectionnez --</option>
            <option value="homme" {{ old('genre') == 'homme' ? 'selected' : '' }}>Homme</option>
            <option value="femme" {{ old('genre') == 'femme' ? 'selected' : '' }}>Femme</option>
            <option value="pas préciser" {{ old('genre') == 'pas préciser' ? 'selected' : '' }}>Ne pas préciser</option>
          </select>
        </div>
      </section>

      <section class="field">
        <label for="typeCreateur">Type de créateur</label>
        <select id="typeCreateur" name="typeCreateur" required>
          <option value="">-- Sélectionnez --</option>
          <option value="independant" {{ old('typeCreateur') == 'independant' ? 'selected' : '' }}>Créateur indépendant</option>
          <option value="maison" {{ old('typeCreateur') == 'maison' ? 'selected' : '' }}>Créateur pour une maison</option>
          <option value="ogun" {{ old('typeCreateur') == 'ogun' ? 'selected' : '' }}>Créateur d'Ogun</option>
        </select>
      </section>

      <section class="group">
        <div class="row">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required>

          <label for="telephone">Téléphone</label>
          <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
        </div>
      </section>

      <section class="field password-field">
        <label for="motdepasse">Mot de passe</label>
        <div class="password-wrapper">
          <input type="password" id="motdepasse" name="motdepasse" required>
          <img src="{{ asset('image/eyeoff-icon.svg') }}" alt="eye" class="eye-icon" id="togglePassword">
        </div>
        <p>Utilisez au moins 8 caractères, dont une majuscule, une minuscule et un chiffre.</p>
        <div class="password-strength">
          <div class="strength-bar" id="strengthBar"></div>
        </div>
        <span class="strength-text" id="strengthText"></span>
      </section>

      <section class="field password-field">
        <label for="confirmPassword">Confirmez le mot de passe</label>
        <div class="password-wrapper">
          <input type="password" id="confirmPassword" name="motdepasse_confirmation" required>
          <img src="{{ asset('image/eyeoff-icon.svg') }}" alt="eye" class="eye-icon" id="toggleConfirm">
        </div>
        <p class="error-message" id="matchError"></p>
      </section>

      <section class="field">
        <label>
          <input type="checkbox" id="conditions" name="conditions" required>
          J’accepte les <a class="info" href="{{ asset('TermsofUse.html') }}">Conditions d’utilisation</a> et la <a class="info" href="{{ asset('PrivacyPolicy.html') }}">Politique de confidentialité</a>
        </label>
      </section>

      <section class="field">
        <button type="submit" class="btn-primary">S’inscrire</button>
      </section>

      <section class="field">
        <div class="separator">Ou s’inscrire avec</div>
      </section>

      <section class="social-buttons">
        <button type="button" class="google">Google</button>
        <button type="button" class="facebook">Facebook</button>
      </section>

      <footer>
        <p class="signin-link">Vous avez déjà un compte ? <a href="{{ route('logincreator') }}">Connectez-vous</a></p>
      </footer>

    </form>

  </main>

  <!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
  <script src="{{ asset('script/registercreator.js') }}"></script>

</body>
</html>
