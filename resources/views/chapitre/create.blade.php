@extends('layouts.creator')

@section('title', 'Créer un chapitre')

@section('content')
<div style="display: flex;">


    {{-- Formulaire --}}
    <main style="flex-grow: 1; padding: 40px;">
        <h1>Créer un nouveau chapitre</h1>

        <form method="POST" action="{{ route('chapitre.store') }}" enctype="multipart/form-data" style="margin-top: 20px;">
            @csrf

            {{-- Nom du chapitre --}}
            <div style="margin-bottom: 20px;">
                <label for="nom_chapitre">Nom du chapitre :</label><br>
                <input type="text" name="nom_chapitre" id="nom_chapitre" style="width: 100%; padding: 8px;" required>
            </div>

            {{-- Sélection du livre --}}
            <div style="margin-bottom: 20px;">
                <label for="id_book">Livre associé :</label><br>
                <select name="id_book" id="id_book" style="width: 100%; padding: 8px;" required>
                    @foreach($livres as $livre)
                        <option value="{{ $livre->id_book }}">{{ $livre->nom_book }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Image du chapitre --}}
            <div style="margin-bottom: 20px;">
                <label for="image_chapitre">Image du chapitre :</label><br>
                <input type="file" name="image_chapitre" id="image_chapitre" accept="image/*" style="width: 100%;">
            </div>

            {{-- Fichier du chapitre --}}
            <div style="margin-bottom: 20px;">
                <label for="fichier_chapitre">Fichier du chapitre (PDF, ZIP, JPG, PNG) :</label><br>
                <input type="file" name="fichier_chapitre" id="fichier_chapitre" accept=".pdf,.zip,.jpg,.jpeg,.png" style="width: 100%;">
            </div>

            {{-- Bouton --}}
            <button type="submit" style="background-color: #3498db; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
                ➕ Créer le chapitre
            </button>
        </form>
    </main>
</div>
@endsection
