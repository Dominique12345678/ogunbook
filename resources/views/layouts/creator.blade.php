<!-- resources/views/layouts/creator.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tableau de bord')</title>
    <link rel="stylesheet" href="{{ asset('css/creator.css') }}">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }

        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            color: white;
            height: 100vh;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar h2 {
            color: #ecf0f1;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: #ecf0f1;
            text-decoration: none;
            margin: 15px 0;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .main-content {
            flex-grow: 1;
            padding: 30px;
        }

        .logout-form {
            margin-top: 30px;
        }

        .logout-form button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-form button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div>
            <h2>OgunBook</h2>
            <a href="{{ route('dashboardcreator') }}">Profil</a>
            <a href="{{ route('ogunbook.index') }}">OgunBook</a>
            <a href="{{ route('chapitre.index') }}">Chapitre</a>
        </div>

        <!-- Formulaire de déconnexion -->
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit">🚪 Déconnexion</button>
        </form>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

</body>
</html>
