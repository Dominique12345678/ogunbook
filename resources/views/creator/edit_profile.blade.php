@extends('layouts.creator')

@section('title', 'Modifier mon Profil Créateur')

@section('content')

<!-- CSS directement intégré pour garantir l'application des styles -->
<style>
    /*
     * Conteneur principal qui centre le formulaire sur la page.
     */
    .form-page-wrapper {
      background-color: #f0fdf4; /* Vert très clair en fond */
      width: 100%;
      min-height: 100vh;
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
      max-width: 52rem; /* Un peu plus large pour le formulaire */
      background-color: #ffffff;
      border-radius: 0.75rem;
      padding: 2rem 2.5rem;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      animation: fade-in-up 0.6s ease-out;
      border-top: 5px solid #22c55e; /* Bordure verte en haut */
    }

    /* Titre du formulaire */
    .form-title {
      font-size: 2.25rem;
      font-weight: bold;
      text-align: center;
      color: #1f2937;
      margin-bottom: 2rem;
    }

    /* Grille pour les champs du formulaire */
    .form-grid {
      display: grid;
      grid-template-columns: 1fr; /* 1 colonne sur mobile */
      gap: 1.5rem;
    }

    @media (min-width: 768px) {
      .form-grid {
        grid-template-columns: 1fr 1fr; /* 2 colonnes sur écrans larges */
      }
    }

    /* Style pour chaque groupe de champ (label + input) */
    .form-group {
      display: flex;
      flex-direction: column;
    }

    /* Champs qui prennent toute la largeur de la grille */
    .full-width {
      grid-column: 1 / -1;
    }

    /* Style des labels */
    .form-label {
      font-weight: 600;
      color: #4b5563;
      margin-bottom: 0.5rem;
      font-size: 0.9rem;
    }

    /* Style des champs de saisie (input, select) */
    .input-field {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1px solid #d1d5db;
      border-radius: 0.375rem;
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
      flex-wrap: wrap; /* Gère le retour à la ligne sur mobile */
      gap: 1rem;
    }

    /* Bouton de soumission principal */
    .btn-submit {
      background: linear-gradient(45deg, #22c55e, #16a34a);
      color: white;
      font-weight: bold;
      padding: 0.8rem 1.8rem;
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

    /* Bloc d'alerte pour les erreurs */
    .alert-error {
      background-color: #fee2e2;
      border-left: 5px solid #ef4444;
      color: #991b1b;
      padding: 1rem;
      margin-bottom: 2rem;
      border-radius: 0.5rem;
    }
    .alert-error strong {
      display: block;
      font-weight: bold;
    }
    .alert-error ul {
      margin-top: 0.5rem;
      padding-left: 1.5rem;
    }
</style>

<div class="form-page-wrapper">
    <form action="{{ route('creator.profile.update') }}" method="POST" class="form-card">
        @csrf
        @method('PUT')

        <h1 class="form-title">Modifier mon Profil</h1>

        @if ($errors->any())
            <div class="alert-error" role="alert">
                <strong>Oups ! Il y a des erreurs.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-grid">
            <!-- Nom -->
            <div class="form-group">
                <label for="nom_createur" class="form-label">Nom :</label>
                <input type="text" name="nom_createur" id="nom_createur" value="{{ old('nom_createur', $createur->nom_createur) }}" class="input-field" required>
            </div>

            <!-- Prénoms -->
            <div class="form-group">
                <label for="prenoms_createur" class="form-label">Prénoms :</label>
                <input type="text" name="prenoms_createur" id="prenoms_createur" value="{{ old('prenoms_createur', $createur->prenoms_createur) }}" class="input-field" required>
            </div>

            <!-- Pseudo -->
            <div class="form-group full-width">
                <label for="pseudo_createur" class="form-label">Pseudo :</label>
                <input type="text" name="pseudo_createur" id="pseudo_createur" value="{{ old('pseudo_createur', $createur->pseudo_createur) }}" class="input-field" required>
            </div>

            <!-- Email -->
            <div class="form-group full-width">
                <label for="email_createur" class="form-label">Email :</label>
                <input type="email" name="email_createur" id="email_createur" value="{{ old('email_createur', $createur->email_createur) }}" class="input-field" required>
            </div>

            <!-- Téléphone et Date de naissance -->
            <div class="form-group">
                <label for="num_tel_createur" class="form-label">Téléphone :</label>
                <input type="text" name="num_tel_createur" id="num_tel_createur" value="{{ old('num_tel_createur', $createur->num_tel_createur) }}" class="input-field" required>
            </div>
            <div class="form-group">
                <label for="date_de_naissance" class="form-label">Date de naissance :</label>
                <input type="date" name="date_de_naissance" id="date_de_naissance" value="{{ old('date_de_naissance', $createur->date_de_naissance) }}" class="input-field" required>
            </div>

            <!-- Genre et Type de créateur -->
            <div class="form-group">
                <label for="genre" class="form-label">Genre :</label>
                <select name="genre" id="genre" class="input-field" required>
                    <option value="Homme" {{ old('genre', $createur->genre) == 'Homme' ? 'selected' : '' }}>Homme</option>
                    <option value="Femme" {{ old('genre', $createur->genre) == 'Femme' ? 'selected' : '' }}>Femme</option>
                    <option value="Ne pas préciser" {{ old('genre', $createur->genre) == 'Ne pas préciser' ? 'selected' : '' }}>Ne pas préciser</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type_createur" class="form-label">Type de créateur :</label>
                <select name="type_createur" id="type_createur" class="input-field" required>
                    <option value="independant" {{ old('type_createur', $createur->type_createur) == 'independant' ? 'selected' : '' }}>Créateur indépendant</option>
                    <option value="maison" {{ old('type_createur', $createur->type_createur) == 'maison' ? 'selected' : '' }}>Créateur pour une maison</option>
                    <option value="ogun" {{ old('type_createur', $createur->type_createur) == 'ogun' ? 'selected' : '' }}>Créateur d'Ogun</option>
                </select>
            </div>

            <!-- Mot de passe -->
            <div class="form-group full-width">
                <label for="mot_de_passe_createur" class="form-label">Nouveau mot de passe (laisser vide si inchangé) :</label>
                <input type="password" name="mot_de_passe_createur" id="mot_de_passe_createur" class="input-field">
            </div>
            <div class="form-group full-width">
                <label for="mot_de_passe_createur_confirmation" class="form-label">Confirmer le nouveau mot de passe :</label>
                <input type="password" name="mot_de_passe_createur_confirmation" id="mot_de_passe_createur_confirmation" class="input-field">
            </div>
        </div>

        <div class="button-group">
            <button type="submit" class="btn-submit">
                Mettre à jour le profil
            </button>
            <a href="{{ route('creator.profile') }}" class="link-cancel">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection