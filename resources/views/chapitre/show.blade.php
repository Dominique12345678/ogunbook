@extends('layouts.creator')

@section('title', 'Détails du Chapitre')

@section('content')
    <h1>Détails du Chapitre : {{ $chapitre->nom_chapitre }}</h1>

    <div style="margin-top: 20px;">
        <p><strong>Livre associé :</strong> {{ $chapitre->ogunbook->titre_ogoun }}</p>
        
        @if ($chapitre->image_chapitre)
            <div style="margin-bottom: 10px;">
                <img src="{{ asset('storage/' . $chapitre->image_chapitre) }}" alt="Image du chapitre" style="max-width: 300px; height: auto;">
            </div>
        @endif

        @if ($chapitre->fichier_chapitre)
            <p>
                <strong>Fichier :</strong> 
                <a href="{{ asset('storage/' . $chapitre->fichier_chapitre) }}" target="_blank">Voir le fichier</a>
            </p>
        @endif
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('my_chapters.edit', $chapitre->id_chapitre) }}" style="background-color: #3498db; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">Modifier</a>
        <a href="{{ route('my_chapters.index') }}" style="background-color: #ccc; color: black; padding: 8px 15px; border-radius: 5px; text-decoration: none; margin-left: 10px;">Retour à la liste</a>
    </div>
@endsection
