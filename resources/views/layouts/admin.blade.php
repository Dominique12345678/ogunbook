<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Tableau de Bord')</title>
    <!-- Tailwind CSS pour un style rapide et responsive -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Styles personnalisés pour le layout */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5; /* Couleur de fond légère */
        }
        .sidebar {
            background-color: #2d3748; /* Couleur sombre pour la barre latérale (gray-800) */
            color: #cbd5e0; /* Texte clair (gray-300) */
            width: 250px;
            min-height: 100vh; /* Prend toute la hauteur de la fenêtre */
            padding: 1.5rem; /* p-6 */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }
        .sidebar a {
            display: block;
            padding: 0.75rem 1rem; /* py-3 px-4 */
            border-radius: 0.5rem; /* rounded-lg */
            margin-bottom: 0.5rem; /* mb-2 */
            transition: background-color 0.2s ease;
            text-decoration: none;
            color: #cbd5e0; /* Texte clair par défaut */
        }
        .sidebar a:hover {
            background-color: #4a5568; /* Couleur au survol (gray-700) */
            color: #fff; /* Texte blanc au survol */
        }
        .sidebar .active {
            background-color: #4299e1; /* Couleur bleue pour l'élément actif (blue-500) */
            color: #fff;
            font-weight: bold;
        }
        .content {
            flex-grow: 1; /* Prend l'espace restant */
            padding: 2rem; /* p-8 */
        }
        .header {
            background-color: #fff;
            padding: 1.5rem 2rem; /* py-6 px-8 */
            border-bottom: 1px solid #e2e8f0; /* gray-200 */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            font-size: 1.5rem; /* text-2xl */
            font-weight: 600; /* font-semibold */
            color: #2d3748;
        }
        .profile-info {
            display: flex;
            align-items: center;
            gap: 0.75rem; /* gap-3 */
        }
        .profile-info img {
            width: 40px;
            height: 40px;
            border-radius: 9999px; /* rounded-full */
            object-fit: cover;
        }
        .profile-info span {
            font-weight: 500;
            color: #4a5568;
        }
    </style>
</head>
<body>
    <div class="flex">
        <!-- Sidebar (Menu Vertical) -->
        <aside class="sidebar">
            <div class="text-2xl font-bold text-white mb-8 text-center">
                Admin Panel
            </div>
            <nav>
                <ul>
                    <li>
                        <!-- Lien vers le profil admin -->
                        <a href="{{ route('admin.profile') }}" class="flex items-center space-x-3 hover:bg-gray-700 rounded-lg p-3 mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <!-- Lien vers les catégories admin -->
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 hover:bg-gray-700 rounded-lg p-3 mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            <span>Catégories</span>
                        </a>
                    </li>
                    <li>
                        <!-- Lien de déconnexion -->
                        <a href="{{ route('admin.logout') }}" class="flex items-center space-x-3 hover:bg-gray-700 rounded-lg p-3 mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            <span>Déconnexion</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Contenu Principal -->
        <main class="flex-1 flex flex-col">
            <header class="header">
                <h1 class="text-2xl font-semibold text-gray-800">@yield('page_title', 'Tableau de Bord Admin')</h1>
                <div class="profile-info">
                    <!-- Placeholder pour l'image de profil -->
                    <img src="https://placehold.co/40x40/cccccc/333333?text=AD" alt="Admin Avatar">
                    <!-- Affichage du nom de l'admin connecté -->
                    <span class="text-gray-700">{{ Session::get('admin_name', 'Admin') }}</span>
                </div>
            </header>
            <div class="content">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
