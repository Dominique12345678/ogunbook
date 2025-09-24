@extends('layouts.creator')

@section('title', 'Modifier le livre')

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

    /* Conteneur du formulaire style "carte" */
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

    /* Style pour l'aperçu de l'image actuelle */
    .current-image-preview {
        display: block;
        max-width: 150px;
        height: auto;
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 5px;
        margin-bottom: 10px;
    }
</style>

<div class="page-container">

    <div class="page-header">
        <h1>Modifier le livre</h1>
        <a href="{{ route('creator.ogunbooks.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Annuler
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

    <form action="{{ route('creator.ogunbooks.update', $ogunbook->id_ogoun) }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom_book">Titre du livre</label>
            <input type="text" id="nom_book" name="nom_book" class="form-control @error('nom_book') is-invalid @enderror" value="{{ old('nom_book', $ogunbook->titre_ogoun) }}" required>
            @error('nom_book')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{ old('description', $ogunbook->description_ogoun) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombre_de_chapitre">Nombre de chapitres</label>
            <input type="number" id="nombre_de_chapitre" name="nombre_de_chapitre" class="form-control @error('nombre_de_chapitre') is-invalid @enderror" value="{{ old('nombre_de_chapitre', $ogunbook->nombre_de_chapitre) }}" min="0" required>
            @error('nombre_de_chapitre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="prix_book">Prix (en $)</label>
            <input type="number" id="prix_book" step="0.01" name="prix_book" class="form-control @error('prix_book') is-invalid @enderror" value="{{ old('prix_book', $ogunbook->prix_ogoun) }}" min="0" required>
            @error('prix_book')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_categorie">Catégorie</label>
            <select id="id_categorie" name="id_categorie" class="form-control @error('id_categorie') is-invalid @enderror" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id_categorie }}" {{ old('id_categorie', $ogunbook->id_categorie) == $categorie->id_categorie ? 'selected' : '' }}>
                        {{ $categorie->nom_categorie }}
                    </option>
                @endforeach
            </select>
            @error('id_categorie')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image_book">Changer l'image de couverture</label>
            @if ($ogunbook->photo_couverture_ogoun)
                <img src="{{ asset('storage/' . $ogunbook->photo_couverture_ogoun) }}" alt="Couverture actuelle" class="current-image-preview">
            @endif
            <input type="file" id="image_book" name="image_book" class="form-control @error('image_book') is-invalid @enderror">
            <small style="color: #6c757d; margin-top: 5px; display: block;">Laissez ce champ vide pour conserver l'image actuelle.</small>
            @error('image_book')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection