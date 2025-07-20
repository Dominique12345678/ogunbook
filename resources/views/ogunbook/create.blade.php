@extends('layouts.creator')

@section('title', 'Créer un livre')

@section('content')
    <h1>Créer un nouveau OgunBook</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ogunbook.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nom du livre :</label><br>
        <input type="text" name="nom_book" value="{{ old('nom_book') }}"><br><br>

        <label>Description :</label><br>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <label>Nombre de chapitres :</label><br>
        <input type="number" name="nombre_de_chapitre" value="{{ old('nombre_de_chapitre', 0) }}"><br><br>

        <label>Prix (en FCFA) :</label><br>
        <input type="number" step="0.01" name="prix_book" value="{{ old('prix_book') }}"><br><br>

        <label>Catégorie :</label><br>
        <select name="id_categorie">
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id_categorie }}">{{ $categorie->nom_categorie }}</option>
            @endforeach
        </select><br><br>

        <label>Image du livre :</label><br>
        <input type="file" name="image_book"><br><br>

        <button type="submit">Créer</button>
    </form>
@endsection
