@extends('layouts.creator')

@section('title', 'Mon Profil Créateur')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Mon Profil</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Informations Personnelles</h2>
            <p class="mb-2"><strong>Nom :</strong> {{ $createur->nom_createur }}</p>
            <p class="mb-2"><strong>Prénoms :</strong> {{ $createur->prenoms_createur }}</p>
            <p class="mb-2"><strong>Pseudo :</strong> {{ $createur->pseudo_createur }}</p>
            <p class="mb-2"><strong>Email :</strong> {{ $createur->email_createur }}</p>
            <p class="mb-2"><strong>Téléphone :</strong> {{ $createur->num_tel_createur }}</p>
            <p class="mb-2"><strong>Date de naissance :</strong> {{ $createur->date_de_naissance }}</p>
            <p class="mb-2"><strong>Genre :</strong> {{ $createur->genre }}</p>
            <p class="mb-2"><strong>Type de créateur :</strong> {{ $createur->type_createur }}</p>
            <p class="mb-2"><strong>Membre depuis :</strong> {{ $createur->created_at->format('d/m/Y') }}</p>

            <a href="{{ route('creator.profile.edit') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Modifier le profil
            </a>
        </div>
    </div>
@endsection
