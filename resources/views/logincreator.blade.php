<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion Créateur | OgunBook</title>

<link rel="stylesheet" href="{{ asset('css/logincreator.css') }}">


  <!-- lien favicon -->
  <link rel="shortcut icon" href="../image/faviconOB.png" type="image/x-icon">

</head>

<body>

  <main class="login-container">

    <!-- Texte de bienvenue -->
    <header class="welcome">
      <h1>Heureux de te revoir</h1>

      @if ($errors->any())
          <div style="color: red; margin-bottom: 1rem;">
              @foreach ($errors->all() as $error)
                  <p>{{ $error }}</p>
              @endforeach
          </div>
      @endif
    </header>

    <!-- Formulaire de connexion -->
    <section class="login-box">

    <form class="login-form" action="{{ route('logincreator.post') }}" method="POST">
    @csrf



        <!-- Email ou téléphone -->
        <div class="form-group">
          <label for="identifiant">Email ou numéro de téléphone</label>
          <input type="text" id="identifiant" name="identifiant" required autocomplete="off">
        </div>

        <!-- Mot de passe -->
        <div class="form-group password-group">
          <label for="motdepasse">Mot de passe</label>
          <div class="password-wrapper">
            <input type="password" id="motdepasse" name="motdepasse" required autocomplete="off">
            <img src="../image/eyeoff-icon.svg" alt="Afficher le mot de passe" class="eye-icon" id="togglePassword">
          </div>
        </div>

        <!-- Rester connecté -->
        <div class="form-options-between">
          <label>
            <input type="checkbox" id="condition" name="remember"> Rester connecté
          </label>
          <a href="../forgotpassword.html" class="forgot-link">Mot de passe oublié ?</a> <!-- Nouveau lien ajouté -->
        </div>

        <!-- Bouton de connexion -->
        <button type="submit" class="btn-primary">Continuer</button>

        <!-- Lien vers inscription -->
        <p class="signup-link">Vous n'avez pas de compte ? <a href="{{ route('registercreator') }}">Inscription</a></p>

        <!-- Séparateur -->
        <div class="separator"><span>Ou</span></div>

        <!-- Boutons sociaux -->
        <div class="social-login">
          <button type="button" class="google-btn">
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="16px" height="16px"><path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/></svg>
            Google
          </button>
          <button type="button" class="facebook-btn">
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="18px" height="18px"><path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"/><path fill="#fff" d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z"/></svg>
            Facebook
          </button>
        </div>

        <!-- Liens bas de page -->
        <footer class="form-footer">
          <a href="../TermsofUse.html">Conditions d’utilisation</a>
          <a href="../PrivacyPolicy.html">Politique de confidentialité</a>
        </footer>

      </form>
    </section>

  </main>

  <script src="./script.js"></script>
  
</body>
</html>
