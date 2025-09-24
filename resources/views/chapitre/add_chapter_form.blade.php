<!-- resources/views/chapitre/add_chapter_form.blade.php -->
@extends('layouts.creator')

@section('title', 'Ajouter un chapitre à ' . $ogunbook->titre_ogoun)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Ajouter un chapitre à "{{ $ogunbook->titre_ogoun }}"</h1>

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

        {{-- ✅ CORRECTION 1 : Ajout du préfixe 'creator.' --}}
        <form method="POST" action="{{ route('creator.chapters.store') }}" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
            @csrf

            <input type="hidden" name="id_book" value="{{ $ogunbook->id_ogoun }}">

            <div class="mb-4">
                <label for="nom_chapitre" class="block text-gray-700 text-sm font-bold mb-2">Nom du chapitre :</label>
                <input type="text" name="nom_chapitre" id="nom_chapitre" value="{{ old('nom_chapitre') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="image_chapitre" class="block text-gray-700 text-sm font-bold mb-2">Image du chapitre (optionnel) :</label>
                <input type="file" name="image_chapitre" id="image_chapitre" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-6">
                <label for="fichier_chapitre" class="block text-gray-700 text-sm font-bold mb-2">Fichier du chapitre (PDF, ZIP, JPG, PNG) :</label>
                <input type="file" name="fichier_chapitre" id="fichier_chapitre" accept=".pdf,.zip,.jpg,.jpeg,.png" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Ajouter le chapitre
                </button>
                
                {{-- ✅ CORRECTION 2 : Ajout du préfixe 'creator.' --}}
                <a href="{{ route('creator.chapters.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Annuler
                </a>
            </div>
        </form>
    </div>
@endsection