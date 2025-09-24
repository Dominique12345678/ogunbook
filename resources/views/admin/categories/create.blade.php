@extends('layouts.admin')

@section('title', 'Créer une catégorie')

@section('content')

<!-- CSS directement intégré pour garantir l'application des styles -->
<style>
    /*
     * Conteneur principal qui centre le formulaire sur la page.
     */
    .form-page-wrapper {
      background-color: #f0fdf4; /* Vert très clair en fond */
      width: 100%;
      min-height: 90vh; /* Ajusté pour mieux s'intégrer dans un layout existant */
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
      box-sizing: border-box;
      font-family: sans-serif;
    }

    /* Animation d'apparition */
    @keyframes fade-in-up {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Carte contenant le formulaire */
    .form-card {
      width: 100%;
      max-width: 40rem; /* Largeur adaptée pour un formulaire simple */
      background-color: #ffffff;
      border-radius: 0.75rem;
      padding: 2.5rem;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      animation: fade-in-up 0.6s ease-out;
      border-top: 5px solid #22c55e; /* Bordure verte en haut */
    }

    /* Titre du formulaire */
    .form-title {
      font-size: 2rem;
      font-weight: bold;
      text-align: center;
      color: #1f2937;
      margin-bottom: 2.5rem;
    }
    
    /* Style pour chaque groupe de champ (label + input) */
    .form-group {
      margin-bottom: 1.5rem;
    }

    /* Style des labels */
    .form-label {
      display: block;
      font-weight: 600;
      color: #4b5563;
      margin-bottom: 0.5rem;
      font-size: 0.9rem;
    }

    /* Style des champs de saisie (input) */
    .input-field {
      width: 100%;
      padding: 0.85rem 1rem;
      border: 1px solid #d1d5db;
      border-radius: 0.5rem;
      font-size: 1rem;
      color: #1f2937;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .input-field:focus {
      outline: none;
      border-color: #22c55e;
      box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3); /* Aura verte au focus */
    }

    /* Conteneur pour les boutons */
    .button-group {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 2.5rem;
    }

    /* Bouton de soumission principal */
    .btn-submit {
      background: linear-gradient(45deg, #22c55e, #16a34a);
      color: white;
      font-weight: bold;
      padding: 0.75rem 1.75rem;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      text-decoration: none;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .btn-submit:hover {
      transform: translateY(-3px);
      box-shadow: 0 7px 20px rgba(0, 0, 0, 0.2);
    }

    /* Lien d'annulation */
    .link-cancel {
      font-weight: bold;
      color: #6b7280;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .link-cancel:hover {
      color: #16a34a; /* Vert au survol */
    }

    /* Bloc d'alerte pour les erreurs de validation */
    .alert-error {
      background-color: #fee2e2;
      border-left: 5px solid #ef4444;
      color: #991b1b;
      padding: 1rem;
      margin-bottom: 2rem;
      border-radius: 0.5rem;
    }
</style>

<div class="form-page-wrapper">
    <div class="form-card">
        <h1 class="form-title">Ajouter une Catégorie</h1>

        <!-- Bloc pour afficher les erreurs de validation -->
        @if ($errors->any())
            <div class="alert-error" role="alert">
                <strong>Oups ! Il y a des erreurs :</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom_categorie" class="form-label">Nom de la nouvelle catégorie</label>
                <input type="text" name="nom_categorie" id="nom_categorie" value="{{ old('nom_categorie') }}" required class="input-field" placeholder="Ex: Science-Fiction, Romance...">
            </div>

            <div class="button-group">
                <button type="submit" class="btn-submit">Créer la Catégorie</button>
                <a href="{{ route('admin.categories.index') }}" class="link-cancel">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection