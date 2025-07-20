@extends('layouts.admin')

@section('title', 'Catégories')

@section('content')
    <h2 class="text-xl font-bold mb-4">Liste des catégories</h2>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-4">+ Nouvelle Catégorie</a>

    <ul>
        @foreach($categories as $categorie)
            <li>{{ $categorie->nom_categorie }}</li>
        @endforeach
    </ul>
@endsection
