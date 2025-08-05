<!-- resources/views/dashboardcreator.blade.php -->
@extends('layouts.creator')

@section('title', 'Tableau de bord Créateur')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Bienvenue, {{ Auth::guard('createur')->user()->nom_createur ?? 'Créateur' }} !</h1>

        <div class="dashboard-stats">
            <div class="stat-card">
                <h3>Total Livres</h3>
                <p>{{ $nombreLivres }}</p>
            </div>
            <div class="stat-card">
                <h3>Total Chapitres</h3>
                <p>{{ $nombreChapitres }}</p>
            </div>
            {{-- Vous pouvez ajouter d'autres statistiques ici --}}
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Actions Rapides</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <a href="{{ route('ogunbooks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded text-center">
                    <i class="fas fa-plus-circle"></i> Créer un nouvel Ogunbook
                </a>
                <!-- ✅ CORRECTION: my_chapters.create devient chapters.create -->
                <a href="{{ route('chapters.create') }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-3 px-4 rounded text-center">
                    <i class="fas fa-plus-square"></i> Ajouter un chapitre
                </a>
                <a href="{{ route('ogunbooks.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-3 px-4 rounded text-center">
                    <i class="fas fa-book-open"></i> Gérer mes Ogunbooks
                </a>
                <!-- ✅ CORRECTION: my_chapters.index devient chapters.index -->
                <a href="{{ route('chapters.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-3 px-4 rounded text-center">
                    <i class="fas fa-list"></i> Gérer mes Chapitres
                </a>
            </div>
        </div>
    </div>
@endsection
