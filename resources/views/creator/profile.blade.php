@extends('layouts.creator')

@section('title', 'Mon Profil Créateur')

@section('content')

<!-- Le CSS est placé directement ici pour garantir son application -->
<style>
    /*
     * Ce conteneur va "casser" le flux normal de votre layout
     * pour prendre tout l'espace disponible et se centrer.
     */
    .profile-page-wrapper {
      background-color: #f3f4f6; /* Fond gris clair */
      width: 100%;
      min-height: 100vh; /* Hauteur minimale de tout l'écran */
      display: flex;
      align-items: center; /* Centrage vertical */
      justify-content: center; /* Centrage horizontal */
      padding: 2rem; /* Espace sur les côtés */
      box-sizing: border-box; /* Assure que le padding n'ajoute pas à la largeur/hauteur */
    }

    /* Animation d'apparition */
    @keyframes fade-in-down {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Style de la carte de profil */
    .profile-card {
      width: 100%;
      max-width: 48rem; /* Largeur maximale de la carte */
      background-color: #ffffff;
      border-radius: 0.75rem; /* Coins plus arrondis */
      padding: 2.5rem; /* Plus d'espace intérieur */
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); /* Ombre plus douce et prononcée */
      animation: fade-in-down 0.6s ease-out;
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
      font-family: sans-serif; /* Police de base propre */
    }

    .profile-card:hover {
        transform: translateY(-5px) scale(1.02); /* Effet de lévitation au survol */
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    /* Titre principal */
    .profile-title {
      font-size: 2.5rem;
      font-weight: bold;
      text-align: center;
      color: #1f2937;
      margin-bottom: 2.5rem;
    }

    /* Grille pour les informations */
    .info-grid {
      display: grid;
      grid-template-columns: 1fr; /* 1 colonne sur mobile */
      gap: 1.5rem;
      color: #374151;
    }

    /* 2 colonnes sur les écrans plus larges */
    @media (min-width: 768px) {
      .info-grid {
        grid-template-columns: 1fr 1fr;
      }
    }

    .info-item {
      display: flex;
      flex-direction: column; /* Label au-dessus de la valeur */
    }

    .info-item strong {
        font-weight: 600;
        color: #4b5563;
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
    }

    .info-item span {
        font-size: 1.1rem;
        color: #111827;
    }

    /* Conteneur pour le bouton */
    .button-container {
      text-align: center;
      margin-top: 3rem;
    }

    /* Bouton "Modifier" */
    .btn-edit {
      display: inline-block;
      background: linear-gradient(45deg, #3b82f6, #6366f1);
      color: #ffffff;
      font-weight: bold;
      padding: 0.8rem 2rem;
      border-radius: 50px; /* Bouton arrondi */
      text-decoration: none;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
    }

    .btn-edit:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 7px 20px rgba(0, 0, 0, 0.3);
    }

    /* Alerte de succès */
    .alert-success {
      background-color: #d1fae5;
      border-left: 5px solid #10b981;
      color: #065f46;
      padding: 1rem;
      margin-bottom: 2rem;
      border-radius: 0.5rem;
    }
</style>

<div class="profile-page-wrapper">
    <div class="profile-card">
        <h1 class="profile-title">Mon Profil</h1>

        @if(session('success'))
            <div class="alert-success" role="alert">
                <strong>Succès :</strong> {{ session('success') }}
            </div>
        @endif

        <div class="info-grid">
            <div class="info-item"><strong>Nom :</strong> <span>{{ $createur->nom_createur }}</span></div>
            <div class="info-item"><strong>Prénoms :</strong> <span>{{ $createur->prenoms_createur }}</span></div>
            <div class="info-item"><strong>Pseudo :</strong> <span>{{ $createur->pseudo_createur }}</span></div>
            <div class="info-item"><strong>Email :</strong> <span>{{ $createur->email_createur }}</span></div>
            <div class="info-item"><strong>Téléphone :</strong> <span>{{ $createur->num_tel_createur }}</span></div>
            <div class="info-item"><strong>Date de naissance :</strong> <span>{{ $createur->date_de_naissance }}</span></div>
            <div class="info-item"><strong>Genre :</strong> <span>{{ $createur->genre }}</span></div>
            <div class="info-item"><strong>Type de créateur :</strong> <span>{{ $createur->type_createur }}</span></div>
            <div class="info-item"><strong>Membre depuis :</strong> <span>{{ $createur->created_at->format('d/m/Y') }}</span></div>
        </div>

        <div class="button-container">
            <a href="{{ route('creator.profile.edit') }}" class="btn-edit">
                Modifier le profil
            </a>
        </div>
    </div>
</div>
@endsection