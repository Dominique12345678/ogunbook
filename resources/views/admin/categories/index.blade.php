@extends('layouts.admin')

@section('title', 'Gestion des Catégories')

@section('content')

<style>
    /* Animation d'apparition pour le contenu de la page */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .page-container {
        animation: fadeIn 0.5s ease-out forwards;
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
        transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .btn-primary {
        background-color: #2A6F29; /* Vert principal */
    }
    .btn-primary:hover {
        background-color: #1E4620; /* Vert plus foncé */
    }

    .btn-edit {
        background-color: #3498db; /* Bleu */
        padding: 6px 12px;
        font-size: 0.9em;
    }
    .btn-edit:hover {
        background-color: #2980b9;
    }

    .btn-delete {
        background-color: #e74c3c; /* Rouge */
        padding: 6px 12px;
        font-size: 0.9em;
    }
    .btn-delete:hover {
        background-color: #c0392b;
    }

    /* Styles pour le tableau */
    .content-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
        font-size: 0.9em;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
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
        transition: background-color 0.3s ease;
    }
    .content-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    .content-table tbody tr:last-of-type {
        border-bottom: 2px solid #1E4620;
    }
    .content-table tbody tr:hover {
        background-color: #d4edda; /* Vert très clair au survol */
        color: #1E4620;
    }
    .actions-cell {
        display: flex;
        gap: 10px;
    }

    /* Style pour les messages de session */
    .session-success {
        padding: 15px;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        border-radius: 5px;
        margin-bottom: 20px;
    }
</style>

<div class="page-container">
    <!-- En-tête de la page -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 class="text-2xl font-bold">Liste des catégories</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nouvelle Catégorie
        </a>
    </div>

    <!-- Message de succès (si présent en session) -->
    @if(session('success'))
        <div class="session-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tableau des catégories -->
    <div style="overflow-x: auto;"> <!-- Pour la responsivité sur petits écrans -->
        <table class="content-table">
            <thead>
                <tr>
                    <th>Nom de la catégorie</th>
                    <th style="width: 200px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->nom_categorie }}</td>
                        <td class="actions-cell">
                            <a href="{{ route('admin.categories.edit', $categorie) }}" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('admin.categories.destroy', $categorie) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="text-align: center; padding: 20px;">Aucune catégorie trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    // Ajout d'une confirmation avant la suppression
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Empêche la soumission immédiate
                if (confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ? Cette action est irréversible.')) {
                    this.submit();
                }
            });
        });
    });
</script>

@endsection