<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Authentification Google</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .test-section { margin: 20px 0; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .btn { display: inline-block; padding: 12px 24px; margin: 10px; text-decoration: none; background: #007bff; color: white; border-radius: 5px; border: none; cursor: pointer; }
        .btn:hover { background: #0056b3; }
        .btn-google { background: #4285f4; }
        .btn-google:hover { background: #3367d6; }
        .error { color: #dc3545; background: #f8d7da; padding: 10px; border-radius: 5px; margin: 10px 0; }
        .success { color: #155724; background: #d4edda; padding: 10px; border-radius: 5px; margin: 10px 0; }
        .info { color: #0c5460; background: #d1ecf1; padding: 10px; border-radius: 5px; margin: 10px 0; }
        h1 { color: #333; text-align: center; }
        h2 { color: #555; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🧪 Test Authentification Google</h1>
        
        <div class="test-section">
            <h2>📋 Configuration actuelle</h2>
            <div class="info">
                <strong>Package Socialite :</strong> 
                @if(class_exists('Laravel\Socialite\Facades\Socialite'))
                    ✅ Installé
                @else
                    ❌ Non installé
                @endif
            </div>
            
            <div class="info">
                <strong>Routes Google :</strong> 
                @if(Route::has('auth.google.user') && Route::has('auth.google.creator'))
                    ✅ Configurées
                @else
                    ❌ Manquantes
                @endif
            </div>
            
            <div class="info">
                <strong>Variables d'environnement :</strong>
                @if(config('services.google.client_id') && config('services.google.client_secret'))
                    ✅ Configurées
                @else
                    ❌ Manquantes
                @endif
            </div>
        </div>
        
        <div class="test-section">
            <h2>🔐 Test des routes d'authentification</h2>
            <p>Cliquez sur les boutons ci-dessous pour tester l'authentification Google :</p>
            
            <a href="{{ route('auth.google.user') }}" class="btn btn-google">
                🔑 Test Google - Utilisateur
            </a>
            
            <a href="{{ route('auth.google.creator') }}" class="btn btn-google">
                🎨 Test Google - Créateur
            </a>
        </div>
        
        <div class="test-section">
            <h2>📊 Informations de session</h2>
            <div class="info">
                <strong>Rôle en session :</strong> {{ session('socialite_role') ?? 'Aucun' }}
            </div>
            
            <div class="info">
                <strong>Utilisateur connecté :</strong> {{ Auth::check() ? 'Oui' : 'Non' }}
            </div>
            
            @if(Auth::check())
                <div class="info">
                    <strong>Email utilisateur :</strong> {{ Auth::user()->email_utilisateur ?? Auth::user()->email ?? 'Non défini' }}
                </div>
            @endif
        </div>
        
        <div class="test-section">
            <h2>⚠️ Messages d'erreur</h2>
            @if(session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif
        </div>
        
        <div class="test-section">
            <h2>🔗 Liens de retour</h2>
            <a href="{{ route('accueil') }}" class="btn">🏠 Retour à l'accueil</a>
            <a href="{{ route('logincreator') }}" class="btn">👤 Connexion créateur</a>
            <a href="{{ route('login') }}" class="btn">🔐 Connexion utilisateur</a>
        </div>
        
        <div class="test-section">
            <h2>📝 Instructions de test</h2>
            <ol>
                <li>Cliquez sur "Test Google - Utilisateur" ou "Test Google - Créateur"</li>
                <li>Vous devriez être redirigé vers Google pour l'authentification</li>
                <li>Après authentification, vous devriez être redirigé vers le callback</li>
                <li>Si tout fonctionne, vous devriez être connecté et redirigé</li>
                <li>Vérifiez les messages d'erreur s'il y en a</li>
            </ol>
        </div>
    </div>
</body>
</html>
