@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <h2 class="text-2xl font-semibold leading-tight mb-6">Tableau de Bord Administrateur</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Statistiques Clés -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <a href="{{ route('admin.users.index') }}" class="stat-card bg-blue-500 hover:bg-blue-600 text-white">
                <h3>Utilisateurs</h3>
                <p>{{ $totalUsers }}</p>
            </a>
            <a href="{{ route('admin.creators.index') }}" class="stat-card bg-green-500 hover:bg-green-600 text-white">
                <h3>Créateurs</h3>
                <p>{{ $totalCreators }}</p>
            </a>
            <a href="{{ route('admin.ogunbooks.index') }}" class="stat-card bg-yellow-500 hover:bg-yellow-600 text-white">
                <h3>Ogunbooks</h3>
                <p>{{ $totalOgunbooks }}</p>
            </a>
            <a href="{{ route('admin.chapters.index') }}" class="stat-card bg-red-500 hover:bg-red-600 text-white">
                <h3>Chapitres</h3>
                <p>{{ $totalChapters }}</p>
            </a>
        </div>

        <!-- Section de gestion des utilisateurs (ancienne liste) -->
        <div>
            <h2 class="text-2xl font-semibold leading-tight mb-4">Gestion des Utilisateurs</h2>
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Utilisateur
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Pseudo
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Date d'inscription
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Statut
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $user->nom_utilisateurs }} {{ $user->prenoms_utilisateurs }}
                                        </p>
                                        <p class="text-gray-600 whitespace-no-wrap">{{ $user->email_utilisateur }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $user->pseudo_utilisateurs }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $user->created_at->format('d/m/Y') }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @if($user->banned_at)
                                    <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Banni</span>
                                    </span>
                                @else
                                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Actif</span>
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                                @if($user->banned_at)
                                    <form action="{{ route('admin.users.unban', $user) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            Débannir
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.users.ban', $user) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            Bannir
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
