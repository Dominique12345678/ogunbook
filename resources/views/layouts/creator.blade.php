<!-- resources/views/layouts/creator.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tableau de bord Créateur')</title>
    <link rel="stylesheet" href="{{ asset('css/creator.css') }}">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <button class="menu-toggle" id="menuToggle">☰</button>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-menu">
            <h2>OgunBook</h2>
            <a href="{{ route('creator.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a>
            <a href="{{ route('creator.profile') }}"><i class="fas fa-user"></i> Profil</a>
            <a href="{{ route('ogunbooks.index') }}"><i class="fas fa-book"></i> Mes OgunBooks</a>
            <a href="{{ route('my_chapters.index') }}"><i class="fas fa-file-alt"></i> Mes Chapitres</a>
            <!-- Nouvelle section Thème -->
            <a href="#" id="themeToggle"><i class="fas fa-moon"></i> Thème (<span id="currentTheme">Clair</span>)</a>
        </div>

        <!-- Formulaire de déconnexion en bas -->
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </button>
        </form>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    <script>
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        // Logique du thème
        const themeToggle = document.getElementById('themeToggle');
        const currentThemeSpan = document.getElementById('currentTheme');
        const body = document.body;

        // Charger le thème sauvegardé ou utiliser le thème clair par défaut
        const savedTheme = localStorage.getItem('theme') || 'light';
        if (savedTheme === 'dark') {
            body.classList.add('dark-theme');
            currentThemeSpan.textContent = 'Sombre';
        } else {
            currentThemeSpan.textContent = 'Clair';
        }

        themeToggle.addEventListener('click', function(e) {
            e.preventDefault();
            if (body.classList.contains('dark-theme')) {
                body.classList.remove('dark-theme');
                localStorage.setItem('theme', 'light');
                currentThemeSpan.textContent = 'Clair';
            } else {
                body.classList.add('dark-theme');
                localStorage.setItem('theme', 'dark');
                currentThemeSpan.textContent = 'Sombre';
            }
        });
    </script>

</body>
</html>