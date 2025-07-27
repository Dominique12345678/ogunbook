@extends('layouts.admin')

@section('title', 'Détails de la Catégorie')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Détails de la Catégorie</h1>

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <p class="mb-2"><strong>ID :</strong> {{ $category->id_categorie }}</p>
            <p class="mb-2"><strong>Nom :</strong> {{ $category->nom_categorie }}</p>
            <p class="mb-2"><strong>Créée le :</strong> {{ $category->created_at->format('d/m/Y H:i') }}</p>
            <p class="mb-2"><strong>Mise à jour le :</strong> {{ $category->updated_at->format('d/m/Y H:i') }}</p>
            
            <div class="mt-4">
                <a href="{{ route('admin.categories.edit', $category->id_categorie) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Modifier
                </a>
                <a href="{{ route('admin.categories.index') }}" class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">
                    Retour à la liste
                </a>
            </div>
        </div>
    </div>
@endsection
