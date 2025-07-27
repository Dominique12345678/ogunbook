@extends('layouts.admin')

@section('title', 'Profil Administrateur')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Mon Profil Administrateur</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Informations du Compte</h2>
            <p class="mb-2"><strong>Nom :</strong> {{ Auth::guard('admin')->user()->name }}</p>
            <p class="mb-2"><strong>Email :</strong> {{ Auth::guard('admin')->user()->email }}</p>
            <p class="mb-2"><strong>Membre depuis :</strong> {{ Auth::guard('admin')->user()->created_at->format('d/m/Y') }}</p>
            
            {{-- Vous pouvez ajouter un bouton pour modifier le profil si nécessaire --}}
            {{-- <a href="{{ route('admin.profile.edit') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Modifier le profil
            </a> --}}
        </div>
    </div>
@endsection
