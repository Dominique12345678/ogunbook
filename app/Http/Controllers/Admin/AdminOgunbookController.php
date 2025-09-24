<?php

// Étape 1 : Assurez-vous que le namespace correspond bien à l'emplacement du fichier
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ogunbook; // Assurez-vous que le modèle Ogunbook existe
use Illuminate\Http\Request;

// Étape 2 : Assurez-vous que le nom de la classe est correct
class AdminOgunbookController extends Controller
{
    /**
     * Affiche la liste de tous les Ogunbooks.
     * C'est la page principale de gestion.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // On récupère tous les livres avec les informations du créateur associé
        $ogunbooks = Ogunbook::with('createur')->latest()->paginate(10); // 10 livres par page

        // On retourne la vue qui affichera la liste (à créer si elle n'existe pas)
        return view('admin.ogunbooks.index', compact('ogunbooks'));
    }

    /**
     * Affiche le formulaire pour créer un nouvel Ogunbook.
     * (L'admin n'a généralement pas besoin de créer, mais la route existe)
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Logique pour afficher le formulaire de création si nécessaire
        return view('admin.ogunbooks.create');
    }

    /**
     * Enregistre un nouvel Ogunbook dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Logique de validation et de création ici
        // ...

        return redirect()->route('admin.ogunbooks.index')->with('success', 'Ogunbook créé avec succès.');
    }

    /**
     * Affiche les détails d'un Ogunbook spécifique.
     *
     * @param  \App\Models\Ogunbook  $ogunbook
     * @return \Illuminate\View\View
     */
    public function show(Ogunbook $ogunbook)
    {
        // On charge les chapitres associés pour les afficher
        $ogunbook->load('chapitres');
        return view('admin.ogunbooks.show', compact('ogunbook'));
    }

    /**
     * Affiche le formulaire pour modifier un Ogunbook.
     *
     * @param  \App\Models\Ogunbook  $ogunbook
     * @return \Illuminate\View\View
     */
    public function edit(Ogunbook $ogunbook)
    {
        return view('admin.ogunbooks.edit', compact('ogunbook'));
    }

    /**
     * Met à jour un Ogunbook dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ogunbook  $ogunbook
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Ogunbook $ogunbook)
    {
        // Logique de validation et de mise à jour ici
        // ...

        return redirect()->route('admin.ogunbooks.index')->with('success', 'Ogunbook mis à jour avec succès.');
    }

    /**
     * Supprime un Ogunbook de la base de données.
     *
     * @param  \App\Models\Ogunbook  $ogunbook
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Ogunbook $ogunbook)
    {
        // Avant de supprimer, on peut vouloir supprimer les fichiers associés (images, etc.)
        // ...

        $ogunbook->delete();

        return redirect()->route('admin.ogunbooks.index')->with('success', 'Ogunbook supprimé avec succès.');
    }
}