<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie; // Assurez-vous que le modèle Categorie est bien importé

class AdminCategoryController extends Controller
{
    /**
     * Affiche la liste de toutes les catégories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupère toutes les catégories par ordre alphabétique
        $categories = Categorie::orderBy('nom_categorie', 'asc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle catégorie.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Enregistre une nouvelle catégorie dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valide les données entrantes
        $request->validate([
            'nom_categorie' => 'required|string|max:255|unique:categories,nom_categorie',
        ], [
            'nom_categorie.required' => 'Le nom de la catégorie est obligatoire.',
            'nom_categorie.unique' => 'Cette catégorie existe déjà.',
        ]);

        // Crée la nouvelle catégorie
        Categorie::create([
            'nom_categorie' => $request->nom_categorie,
        ]);

        // Redirige vers la liste avec un message de succès
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    /**
     * Affiche les détails d'une catégorie spécifique.
     * (Optionnel, car souvent non nécessaire pour une gestion simple)
     *
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\View\View
     */
    public function show(Categorie $category)
    {
        // Laravel trouve automatiquement la catégorie grâce à son ID dans l'URL
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Affiche le formulaire pour modifier une catégorie existante.
     *
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\View\View
     */
    public function edit(Categorie $category)
    {
        // Laravel trouve automatiquement la catégorie grâce à son ID dans l'URL
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Met à jour une catégorie spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Categorie $category)
    {
        // Valide les données, en s'assurant que le nom est unique,
        // sauf pour la catégorie actuelle, en spécifiant la clé primaire 'id_categorie'.
        $request->validate([
            'nom_categorie' => 'required|string|max:255|unique:categories,nom_categorie,' . $category->id_categorie . ',id_categorie',
        ], [
            'nom_categorie.required' => 'Le nom de la catégorie est obligatoire.',
            'nom_categorie.unique' => 'Cette catégorie existe déjà.',
        ]);

        // Met à jour la catégorie
        $category->update([
            'nom_categorie' => $request->nom_categorie,
        ]);

        // Redirige vers la liste avec un message de succès
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie modifiée avec succès.');
    }

    /**
     * Supprime une catégorie de la base de données.
     *
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Categorie $category)
    {
        // Supprime la catégorie
        $category->delete();

        // Redirige vers la liste avec un message de succès
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}