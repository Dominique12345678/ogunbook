@extends('layouts.admin') {{-- Indique que cette vue utilise le layout admin.blade.php --}}

@section('title', 'Tableau de Bord Admin') {{-- Définit le titre de la page dans l'onglet du navigateur --}}
@section('page_title', 'Aperçu du Tableau de Bord') {{-- Définit le titre affiché dans le header du layout --}}

@section('content')
    {{-- Le contenu de votre page existante va ici --}}
    <div class="bg-white p-8 rounded-lg shadow-md text-center"> {{-- J'ai ajouté quelques classes Tailwind pour l'esthétique --}}
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Bienvenue sur le Tableau de Bord Administrateur !</h1>
        <p class="text-lg text-gray-600 mb-6">Vous êtes connecté en tant qu'administrateur.</p>
        <p class="text-xl font-semibold text-blue-600 mb-8">Nom d'utilisateur : {{ Session::get('admin_name', 'Admin') }}</p>
        <a href="{{ route('admin.logout') }}" class="inline-block px-6 py-3 bg-red-500 text-white font-semibold rounded-lg shadow hover:bg-red-600 transition duration-300 ease-in-out">
            Déconnexion
        </a>
    </div>
@endsection
