@extends('layouts.creator')

@section('title', 'Mes OgunBooks')

@section('content')

<style>
    /* Animation d'apparition pour le contenu */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Conteneur principal pour centrer le contenu */
    .page-container {
        max-width: 1200px; /* Largeur maximale du contenu */
        margin: 0 auto; /* Centrage horizontal */
        padding: 20px;
        animation: fadeIn 0.5s ease-out forwards;
    }

    /* En-tête de la page */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap; /* Pour les petits écrans */
        gap: 15px;
    }
    .page-header h1 {
        font-size: 2em;
        font-weight: bold;
        color: #333;
    }

    /* Styles pour les boutons */
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
        transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }

    .btn-primary { background-color: #2A6F29; }
    .btn-primary:hover { background-color: #1E4620; }
    .btn-edit { background-color: #3498db; padding: 6px 12px; font-size: 0.9em; }
    .btn-edit:hover { background-color: #2980b9; }
    .btn-delete { background-color: #e74c3c; padding: 6px 12px; font-size: 0.9em; }
    .btn-delete:hover { background-color: #c0392b; }

    /* Style pour les messages de succès */
    .alert-success {
        padding: 15px;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    /* Styles pour le tableau */
    .content-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.95em;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden; /* Important pour que le border-radius s'applique aux coins */
    }
    .content-table thead tr {
        background-color: #1E4620; /* Vert foncé */
        color: #ffffff;
        text-align: left;
    }
    .content-table th, .content-table td {
        padding: 12px 15px;
    }
    .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .content-table tbody tr:nth-of-type(even) {
        background-color: #f8f8f8;
    }
    .content-table tbody tr:last-of-type {
        border-bottom: 2px solid #1E4620;
    }
    .content-table tbody tr:hover {
        background-color: #e8f5e9; /* Vert très clair au survol */
        transform: scale(1.01);
    }
    .actions-cell {
        display: flex;
        gap: 10px;
        align-items: center;
    }
    .book-cover {
        width: 60px;
        height: 80px;
        object-fit: cover;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
</style>

<div class="page-container">

    <div class="page-header">
        <h1>Mes OgunBooks</h1>
        <a href="{{ route('creator.ogunbooks.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Créer un nouveau livre
        </a>
    </div>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div style="overflow-x: auto;"> <!-- Pour la responsivité sur petits écrans -->
        <table class="content-table">
            <thead>
                <tr>
                    <th>Couverture</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Chapitres</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ogunbooks as $book)
                    <tr>
                        <td>
                            @if ($book->photo_couverture_ogoun)
                                <img src="{{ asset('storage/' . $book->photo_couverture_ogoun) }}" alt="Couverture de {{ $book->titre_ogoun }}" class="book-cover">
                            @else
                                <span style="color: #888;">N/A</span>
                            @endif
                        </td>
                        <td style="font-weight: bold;">{{ $book->titre_ogoun }}</td>
                        <td>{{ Str::limit($book->description_ogoun, 70) }}</td>
                        <td style="text-align: center;">{{ $book->nombre_de_chapitre }}</td>
                        <td>{{ number_format($book->prix_ogoun, 2) }} $</td>
                        <td>{{ $book->categorie->nom_categorie ?? 'Non défini' }}</td>
                        <td>
                            <div class="actions-cell">
                                <a href="{{ route('creator.ogunbooks.edit', $book->id_ogoun) }}" class="btn btn-edit">
                                    <i class="fas fa-edit"></i> Éditer
                                </a>
                                <form action="{{ route('creator.ogunbooks.destroy', $book->id_ogoun) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; font-size: 1.1em; color: #777;">
                            Vous n'avez encore créé aucun livre. Commencez dès maintenant !
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection