@extends('layouts.creator')

@section('title', 'Créer un nouveau livre')

@section('content')

<style>
    /* Animation d'apparition */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Conteneur principal pour centrer le contenu */
    .page-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        animation: fadeIn 0.5s ease-out forwards;
    }

    /* Conteneur du formulaire avec style "carte" */
    .form-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
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

    /* Groupe de formulaire (label + input) */
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
    }
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1em;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .form-control:focus {
        outline: none;
        border-color: #2A6F29; /* Vert principal */
        box-shadow: 0 0 0 3px rgba(42, 111, 41, 0.2);
    }

    /* Style pour les champs en erreur */
    .form-control.is-invalid {
        border-color: #e74c3c;
    }
    .invalid-feedback {
        color: #e74c3c;
        font-size: 0.875em;
        margin-top: 5px;
    }

    /* Boutons */
    .btn {
        padding: 12px 25px;
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
    .btn-secondary {
        background-color: #6c757d;
        color: white;
        text-decoration: none;
    }
    .btn-secondary:hover { background-color: #5a6268; }
    .form-actions {
        margin-top: 30px;
        text-align: right;
    }

    /* Alerte pour les erreurs */
    .alert-danger {
        padding: 15px;
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .alert-danger ul {
        margin: 0;
        padding-left: 20px;
    }

    /* Style personnalisé pour l'input de type file */
    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
    }
    .file-input-wrapper input[type=file] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }
    .file-input-button {
        background-color: #f8f9fa;
        padding: 12px 15px;
        border-right: 1px solid #ccc;
        color: #555;
    }
    .file-input-label {
        padding-left: 10px;
        color: #888;
        font-style: italic;
    }
    .file-input-wrapper:hover .file-input-button {
        background-color: #e2e6ea;
    }
</style>

<div class="page-container">

    <div class="page-header">
        <h1>Créer un nouveau OgunBook</h1>
        <a href="{{ route('creator.ogunbooks.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Retour à la liste
        </a>
    </div>

    @if ($errors->any())
        <div class="alert-danger">
            <strong>Oups ! Il y a eu quelques problèmes avec votre saisie.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('creator.ogunbooks.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf

        <div class="form-group">
            <label for="nom_book">Titre du livre</label>
            <input type="text" id="nom_book" name="nom_book" class="form-control @error('nom_book') is-invalid @enderror" value="{{ old('nom_book') }}" required>
            @error('nom_book')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombre_de_chapitre">Nombre de chapitres</label>
            <input type="number" id="nombre_de_chapitre" name="nombre_de_chapitre" class="form-control @error('nombre_de_chapitre') is-invalid @enderror" value="{{ old('nombre_de_chapitre', 1) }}" min="0" required>
            @error('nombre_de_chapitre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="prix_book">Prix (en $)</label>
            <input type="number" id="prix_book" step="0.01" name="prix_book" class="form-control @error('prix_book') is-invalid @enderror" value="{{ old('prix_book') }}" min="0" required>
            @error('prix_book')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_categorie">Catégorie</label>
            <select id="id_categorie" name="id_categorie" class="form-control @error('id_categorie') is-invalid @enderror" required>
                <option value="" disabled selected>-- Choisissez une catégorie --</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id_categorie }}" {{ old('id_categorie') == $categorie->id_categorie ? 'selected' : '' }}>
                        {{ $categorie->nom_categorie }}
                    </option>
                @endforeach
            </select>
            @error('id_categorie')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image_book">Image de couverture</label>
            <div class="file-input-wrapper">
                <input type="file" id="image_book" name="image_book" class="@error('image_book') is-invalid @enderror" onchange="document.getElementById('file-name').textContent = this.files[0].name">
                <span class="file-input-button"><i class="fas fa-upload"></i></span>
                <span class="file-input-label" id="file-name">Choisir un fichier...</span>
            </div>
            @error('image_book')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Créer le livre
            </button>
        </div>
    </form>
</div>
@endsection