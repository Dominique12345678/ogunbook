<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ogunbook Admin') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Styles pour le layout admin */
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f4f7f6;
        }
        .admin-sidebar {
            width: 250px;
            background-color: #1E4620; /* Vert foncé */
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: width 0.3s ease;
        }
        .admin-sidebar h2 {
            color: white;
            font-size: 24px;
            margin-bottom: 30px;
            text-align: center;
        }
        .admin-sidebar a, .submenu-toggle {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            text-decoration: none;
            margin: 10px 0;
            padding: 12px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .admin-sidebar a:hover, .submenu-toggle:hover {
            background-color: #2A6F29; /* Vert plus clair au survol */
        }
        .admin-sidebar .logout-form button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .admin-sidebar .logout-form button:hover {
            background-color: #c0392b;
        }
        .admin-main-content {
            flex-grow: 1;
            padding: 30px;
        }

        /* Styles pour le sous-menu */
        .submenu-toggle {
            cursor: pointer;
            justify-content: space-between;
        }
        .submenu {
            display: none; /* Caché par défaut */
            padding-left: 20px;
            overflow: hidden;
        }
        .submenu.active {
            display: block; /* Affiché quand la classe active est présente */
        }
        .submenu a {
            padding: 8px 15px;
            font-size: 0.9em;
        }
        .submenu-toggle .fa-chevron-down {
            transition: transform 0.3s ease;
        }
        .submenu-toggle.open .fa-chevron-down {
            transform: rotate(180deg);
        }


        /* Responsive pour l'admin sidebar */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            .admin-sidebar {
                width: 100%;
                height: auto;
                position: static;
            }
            .admin-sidebar h2 {
                display: none;
            }
            .admin-sidebar > div:first-child {
                display: flex;
                flex-direction: column;
                width: 100%;
            }
            .admin-sidebar .logout-form {
                width: auto;
                margin-top: 10px;
                padding: 0 15px;
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="admin-sidebar">
        <div>
            <h2>Admin Panel</h2>
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt fa-fw"></i> Tableau de bord</a>
            <a href="{{ route('admin.users.index') }}"><i class="fas fa-users fa-fw"></i> Gérer les Utilisateurs</a>
            <a href="{{ route('admin.creators.index') }}"><i class="fas fa-user-tie fa-fw"></i> Gérer les Créateurs</a>

            <!-- Menu Catégories avec sous-menu -->
            <div>
                <div class="submenu-toggle" id="categories-toggle">
                    <span><i class="fas fa-tags fa-fw"></i> Gérer les Catégories</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="submenu {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" id="categories-submenu">
                    <a href="{{ route('admin.categories.index') }}"><i class="fas fa-list fa-fw"></i> Lister les catégories</a>
                    <a href="{{ route('admin.categories.create') }}"><i class="fas fa-plus fa-fw"></i> Créer une catégorie</a>
                </div>
            </div>

            <a href="{{ route('admin.profile') }}"><i class="fas fa-user-circle fa-fw"></i> Mon Profil</a>
        </div>

        <form method="POST" action="{{ route('admin.logout') }}" class="logout-form">
            @csrf
            <button type="submit">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </button>
        </form>
    </div>

    <main class="admin-main-content">
        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('categories-toggle');
            const submenu = document.getElementById('categories-submenu');
            
            // Garde le sous-menu ouvert si la classe 'active' est déjà présente (via Blade)
            if (submenu.classList.contains('active')) {
                toggle.classList.add('open');
            }

            toggle.addEventListener('click', function() {
                submenu.classList.toggle('active');
                toggle.classList.toggle('open');
            });
        });
    </script>
</body>
</html>