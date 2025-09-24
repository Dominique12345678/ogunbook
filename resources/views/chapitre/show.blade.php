@extends('layouts.creator')

@section('title', 'Détails du Chapitre')

@section('content')

<style>
    /* Animation d'apparition */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Conteneur principal pour centrer le contenu */
    .page-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        animation: fadeIn 0.5s ease-out forwards;
    }

    /* En-tête de la page */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }
    .page-header h1 {
        font-size: 2em;
        font-weight: bold;
        color: #333;
    }

    /* Conteneur de détails style "carte" */
    .details-container {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden; /* Pour que les bordures internes s'affichent correctement */
    }

    .details-header {
        padding: 20px 25px;
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }
    .details-header h2 {
        font-size: 1.75em;
        margin: 0;
        color: #1E4620; /* Vert foncé */
    }
    .book-link {
        color: #6c757d;
        font-size: 1em;
    }

    .details-body {
        padding: 25px;
    }
    .detail-item {
        margin-bottom: 25px;
    }
    .detail-item:last-child {
        margin-bottom: 0;
    }
    .detail-item h3 {
        font-size: 1.2em;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
        border-left: 3px solid #2A6F29; /* Accent vert */
        padding-left: 10px;
    }

    .chapter-image-preview {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 5px;
    }

    .details-footer {
        padding: 20px 25px;
        background-color: #f8f9fa;
        border-top: 1px solid #e9ecef;
        text-align: right;
    }

    /* Boutons */
    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }
    .btn-primary { background-color: #2A6F29; }
    .btn-primary:hover { background-color: #1E4620; }
    .btn-secondary { background-color: #6c757d; }
    .btn-secondary:hover { background-color: #5a6268; }
    .btn-download { background-color: #3498db; }
    .btn-download:hover { background-color: #2980b9; }

</style>

<div class="page-container">

    <div class="page-header">
        <h1>Détails du Chapitre</h1>
        <a href="{{ route('my_chapters.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Retour à la liste
        </a>
    </div>

    <div class="details-container">
        <div class="details-header">
            <h2>{{ $chapitre->nom_chapitre }}</h2>
            <span class="book-link">
                Livre associé : <strong>{{ $chapitre->ogunbook->titre_ogoun }}</strong>
            </span>
        </div>

        <div class="details-body">
            @if ($chapitre->image_chapitre)
                <div class="detail-item">
                    <h3>Image d'illustration</h3>
                    <img src="{{ asset('storage/' . $chapitre->image_chapitre) }}" alt="Image du chapitre" class="chapter-image-preview">
                </div>
            @endif

            @if ($chapitre->fichier_chapitre)
                <div class="detail-item">
                    <h3>Fichier du chapitre</h3>
                    <a href="{{ asset('storage/' . $chapitre->fichier_chapitre) }}" target="_blank" class="btn btn-download">
                        <i class="fas fa-download"></i> Télécharger / Voir le fichier
                    </a>
                </div>
            @endif

            @if (!$chapitre->image_chapitre && !$chapitre->fichier_chapitre)
                <p style="color: #777; font-style: italic;">Ce chapitre ne contient ni image, ni fichier à afficher.</p>
            @endif
        </div>

        <div class="details-footer">
            <a href="{{ route('my_chapters.edit', $chapitre->id_chapitre) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Modifier ce chapitre
            </a>
        </div>
    </div>

</div>
@endsection