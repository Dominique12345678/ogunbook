@extends('layouts.admin')

@section('title', 'Créer une catégorie')

@section('content')
    <h2 class="text-xl font-bold mb-4">Ajouter une catégorie</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <label for="nom_categorie">Nom de la catégorie</label>
        <input type="text" name="nom_categorie" id="nom_categorie" required class="border p-2 w-full mb-4">

        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@endsection
