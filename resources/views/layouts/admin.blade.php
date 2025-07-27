<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-g">
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
            background-color: #2c3e50; /* Vert foncé */
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .admin-sidebar h2 {
            color: white;
            font-size: 24px;
            margin-bottom: 30px;
            text-align: center;
        }
        .admin-sidebar a {
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
        .admin-sidebar a:hover {
            background-color: #23AF20; /* Vert clair */
        }
        .admin-sidebar .logout-form button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        .admin-sidebar .logout-form button:hover {
            background-color: #c0392b;
        }
        .admin-main-content {
            flex-grow: 1;
            padding: 30px;
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
                flex-direction: row;
                justify-content: space-around;
                flex-wrap: wrap;
            }
            .admin-sidebar h2 {
                display: none;
            }
            .admin-sidebar a {
                margin: 5px 0;
                padding: 8px 12px;
                font-size: 14px;
            }
            .admin-sidebar .logout-form {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="admin-sidebar">
        <div>
            <h2>Admin Panel</h2>
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a>
            <a href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i> Gérer les Utilisateurs</a>
            <a href="{{ route('admin.creators.index') }}"><i class="fas fa-user-tie"></i> Gérer les Créateurs</a>
            <a href="{{ route('admin.categories.index') }}"><i class="fas fa-tags"></i> Gérer les Catégories</a>
            <a href="{{ route('admin.profile') }}"><i class="fas fa-user-circle"></i> Mon Profil</a>
        </div>

        <form method="POST" action="{{ route('admin.logout') }}" class="logout-form">
            @csrf
            <button type="submit">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </button>
        </form>
    </div>

    <div class="admin-main-content">
        @yield('content')
    </div>
</body>
</html>
