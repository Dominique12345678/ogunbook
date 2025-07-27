@extends('layouts.creator')

@section('title', 'Modifier le chapitre')

@section('content')
    <h1>Modifier le chapitre : {{ $chapitre->nom_chapitre }}</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('my_chapters.update', $chapitre->id_chapitre) }}" enctype="multipart/form-data" style="margin-top: 20px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label for="nom_chapitre">Nom du chapitre :</label><br>
            <input type="text" name="nom_chapitre" id="nom_chapitre" value="{{ old('nom_chapitre', $chapitre->nom_chapitre) }}" style="width: 100%; padding: 8px;" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="id_book">Livre associé :</label><br>
            <select name="id_book" id="id_book" style="width: 100%; padding: 8px;" required>
                @foreach($livres as $livre)
                    <option value="{{ $livre->id_ogoun }}" {{ old('id_book', $chapitre->id_ogoun) == $livre->id_ogoun ? 'selected' : '' }}>{{ $livre->titre_ogoun }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="image_chapitre">Image du chapitre (laisser vide pour garder l'actuelle) :</label><br>
            <input type="file" name="image_chapitre" id="image_chapitre" accept="image/*" style="width: 100%;">
            @if ($chapitre->image_chapitre)
                <p>Image actuelle : <img src="{{ asset('storage/' . $chapitre->image_chapitre) }}" alt="Image actuelle" style="max-width: 100px; height: auto;"></p>
            @endif
        </div>

        <div style="margin-bottom: 20px;">
            <label for="fichier_chapitre">Fichier du chapitre (PDF, ZIP, JPG, PNG - laisser vide pour garder l'actuel) :</label><br>
            <input type="file" name="fichier_chapitre" id="fichier_chapitre" accept=".pdf,.zip,.jpg,.jpeg,.png" style="width: 100%;">
            @if ($chapitre->fichier_chapitre)
                <p>Fichier actuel : <a href="{{ asset('storage/' . $chapitre->fichier_chapitre) }}" target="_blank">Voir le fichier actuel</a></p>
            @endif
        </div>

        <button type="submit" style="background-color: #3498db; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
            Mettre à jour le chapitre
        </button>
    </form>
@endsection
