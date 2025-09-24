@extends('layouts.creator')

@section('title', 'Mes chapitres')

@section('content')
    <div class="page-header">
        <h1>Liste des chapitres</h1>
        <a href="{{ route('creator.chapters.create') }}" class="btn btn-primary">
            ➕ Ajouter un nouveau chapitre
        </a>
    </div>

    @if ($chapitres->isEmpty())
        <div class="chapter-card">
            <p>Aucun chapitre créé pour le moment.</p>
        </div>
    @else
        @foreach($chapitres as $chapitre)
            <div class="chapter-card">
                <h3>{{ $chapitre->nom_chapitre }}</h3>
                <p><strong>Livre :</strong> <span class="book-title">{{ $chapitre->ogunbook->titre_ogoun }}</span></p>

                @if ($chapitre->image_chapitre)
                    <img src="{{ asset('chapitres/images/' . $chapitre->image_chapitre) }}" alt="Image du chapitre">
                @endif

                @if ($chapitre->fichier_chapitre)
                    <a href="{{ asset('chapitres/' . $chapitre->fichier_chapitre) }}" target="_blank" class="file-link">
                        📄 Voir le fichier
                    </a>
                @endif

                <div class="chapter-actions">
                    <a href="{{ route('creator.chapters.edit', $chapitre->id_chapitre) }}" class="btn btn-edit">
                        ✏️ Modifier
                    </a>

                    <form action="{{ route('creator.chapters.destroy', $chapitre->id_chapitre) }}" method="POST" onsubmit="return confirm('Supprimer ce chapitre ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">
                            🗑️ Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
@endsection