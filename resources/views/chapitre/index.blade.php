@extends('layouts.creator')

@section('title', 'Mes chapitres')

@section('content')
    <h1>Liste des chapitres</h1>

    <!-- Bouton vers la page de création -->
    <div style="margin-bottom: 20px;">
        <a href="{{ route('my_chapters.create') }}" style="
            background-color: #2c3e50;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
        ">➕ Ajouter un nouveau chapitre</a>
    </div>

    @if ($chapitres->isEmpty())
        <p>Aucun chapitre créé pour le moment.</p>
    @else
        @foreach($chapitres as $chapitre)
            <div style="border:1px solid #ccc; padding: 10px; margin: 10px 0; border-radius: 5px;">
                <h3>{{ $chapitre->nom_chapitre }}</h3>
                <p><strong>Livre :</strong> {{ $chapitre->ogunbook->titre_ogoun }}</p>

                {{-- Affichage de l’image si disponible --}}
                @if ($chapitre->image_chapitre)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('chapitres/images/' . $chapitre->image_chapitre) }}" alt="Image du chapitre" style="max-width: 200px; height: auto;">
                    </div>
                @endif

                {{-- Lien vers le fichier --}}
                @if ($chapitre->fichier_chapitre)
                    <p>
                        <a href="{{ asset('chapitres/' . $chapitre->fichier_chapitre) }}" target="_blank">
                            📄 Voir le fichier
                        </a>
                    </p>
                @endif

                {{-- Boutons --}}
                <div style="display: flex; gap: 10px;">
                    {{-- Bouton Modifier --}}
                    <a href="{{ route('my_chapters.edit', $chapitre->id_chapitre) }}" style="
                        background-color: #3498db;
                        color: white;
                        padding: 5px 10px;
                        border-radius: 3px;
                        text-decoration: none;
                    ">
                        ✏️ Modifier
                    </a>

                    {{-- Bouton Supprimer --}}
                    <form action="{{ route('my_chapters.destroy', $chapitre->id_chapitre) }}" method="POST" onsubmit="return confirm('Supprimer ce chapitre ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="
                            background-color: #e74c3c;
                            color: white;
                            padding: 5px 10px;
                            border: none;
                            border-radius: 3px;
                            cursor: pointer;
                        ">
                            🗑️ Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
@endsection