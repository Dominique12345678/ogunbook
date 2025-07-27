@extends('layouts.creator')

@section('title', 'Modifier mon Profil Créateur')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Modifier mon Profil</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oups !</strong>
                <span class="block sm:inline">Il y a eu des problèmes avec votre saisie.</span>
                <ul class="mt-3 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('creator.profile.update') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label for="nom_createur" class="block text-gray-700 text-sm font-bold mb-2">Nom :</label>
                    <input type="text" name="nom_createur" id="nom_createur" value="{{ old('nom_createur', $createur->nom_createur) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div>
                    <label for="prenoms_createur" class="block text-gray-700 text-sm font-bold mb-2">Prénoms :</label>
                    <input type="text" name="prenoms_createur" id="prenoms_createur" value="{{ old('prenoms_createur', $createur->prenoms_createur) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="pseudo_createur" class="block text-gray-700 text-sm font-bold mb-2">Pseudo :</label>
                <input type="text" name="pseudo_createur" id="pseudo_createur" value="{{ old('pseudo_createur', $createur->pseudo_createur) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="email_createur" class="block text-gray-700 text-sm font-bold mb-2">Email :</label>
                <input type="email" name="email_createur" id="email_createur" value="{{ old('email_createur', $createur->email_createur) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="num_tel_createur" class="block text-gray-700 text-sm font-bold mb-2">Téléphone :</label>
                <input type="text" name="num_tel_createur" id="num_tel_createur" value="{{ old('num_tel_createur', $createur->num_tel_createur) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="date_de_naissance" class="block text-gray-700 text-sm font-bold mb-2">Date de naissance :</label>
                <input type="date" name="date_de_naissance" id="date_de_naissance" value="{{ old('date_de_naissance', $createur->date_de_naissance) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre :</label>
                <select name="genre" id="genre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="Homme" {{ old('genre', $createur->genre) == 'Homme' ? 'selected' : '' }}>Homme</option>
                    <option value="Femme" {{ old('genre', $createur->genre) == 'Femme' ? 'selected' : '' }}>Femme</option>
                    <option value="Ne pas préciser" {{ old('genre', $createur->genre) == 'Ne pas préciser' ? 'selected' : '' }}>Ne pas préciser</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="type_createur" class="block text-gray-700 text-sm font-bold mb-2">Type de créateur :</label>
                <select name="type_createur" id="type_createur" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="independant" {{ old('type_createur', $createur->type_createur) == 'independant' ? 'selected' : '' }}>Créateur indépendant</option>
                    <option value="maison" {{ old('type_createur', $createur->type_createur) == 'maison' ? 'selected' : '' }}>Créateur pour une maison</option>
                    <option value="ogun" {{ old('type_createur', $createur->type_createur) == 'ogun' ? 'selected' : '' }}>Créateur d'Ogun</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="mot_de_passe_createur" class="block text-gray-700 text-sm font-bold mb-2">Nouveau mot de passe (laisser vide si inchangé) :</label>
                <input type="password" name="mot_de_passe_createur" id="mot_de_passe_createur" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-6">
                <label for="mot_de_passe_createur_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirmer le nouveau mot de passe :</label>
                <input type="password" name="mot_de_passe_createur_confirmation" id="mot_de_passe_createur_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Mettre à jour le profil
                </button>
                <a href="{{ route('creator.profile') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Annuler
                </a>
            </div>
        </form>
    </div>
@endsection
