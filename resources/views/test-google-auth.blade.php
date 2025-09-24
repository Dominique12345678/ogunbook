<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Authentification Google</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        .test-section { margin: 20px 0; padding: 20px; border: 1px solid #ccc; }
        .btn { padding: 10px 20px; margin: 10px; text-decoration: none; background: #007bff; color: white; border-radius: 5px; }
        .btn:hover { background: #0056b3; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1>Test Authentification Google</h1>
    
    <div class="test-section">
        <h2>Test des routes Google</h2>
        <p>Cliquez sur les liens ci-dessous pour tester l'authentification Google :</p>
        
        <a href="{{ route('auth.google.user') }}" class="btn">Test Google - Utilisateur</a>
        <a href="{{ route('auth.google.creator') }}" class="btn">Test Google - Créateur</a>
    </div>
    
    <div class="test-section">
        <h2>Informations de session</h2>
        <p><strong>Rôle en session :</strong> {{ session('socialite_role') ?? 'Aucun' }}</p>
        <p><strong>Utilisateur connecté :</strong> {{ Auth::check() ? 'Oui' : 'Non' }}</p>
        @if(Auth::check())
            <p><strong>Email utilisateur :</strong> {{ Auth::user()->email_utilisateur ?? Auth::user()->email ?? 'Non défini' }}</p>
        @endif
    </div>
    
    <div class="test-section">
        <h2>Messages d'erreur</h2>
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
    </div>
    
    <div class="test-section">
        <h2>Liens de retour</h2>
        <a href="{{ route('logincreator') }}" class="btn">Retour à la connexion créateur</a>
        <a href="{{ route('login') }}" class="btn">Retour à la connexion utilisateur</a>
    </div>
</body>
</html>
