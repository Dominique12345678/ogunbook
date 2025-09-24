<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ogunbook;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OgunbookController extends Controller
{
    /**
     * Affiche la liste des livres du créateur connecté
     */
    public function index()
    {
        $idCreateur = Auth::guard('createur')->id();
        $ogunbooks = Ogunbook::where('id_createur', $idCreateur)
            ->with('categorie')
            ->get();

        return view('ogunbook.index', compact('ogunbooks'));
    }

    /**
     * Affiche le formulaire de création d’un nouveau livre
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('ogunbook.create', compact('categories'));
    }

    /**
     * Enregistre un nouveau livre dans la base de données
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_book' => 'required|string|max:255',
            'description' => 'required|string',
            'nombre_de_chapitre' => 'required|integer|min:0',
            'prix_book' => 'required|numeric|min:0',
            'id_categorie' => 'required|exists:categories,id_categorie',
            'image_book' => 'nullable|image|max:2048', // max 2 Mo
        ]);

        // Traitement de l’image si elle est envoyée
        $imagePath = null;
        if ($request->hasFile('image_book')) {
            $imagePath = $request->file('image_book')->store('books', 'public');
        }

        // Création du livre
        $ogunbook = new Ogunbook();
        $ogunbook->titre_ogoun = $request->nom_book;
        $ogunbook->description_ogoun = $request->description;
        $ogunbook->nombre_de_chapitre = $request->nombre_de_chapitre;
        $ogunbook->prix_ogoun = $request->prix_book;
        $ogunbook->id_categorie = $request->id_categorie;
        $ogunbook->id_createur = Auth::guard('createur')->id();
        $ogunbook->photo_couverture_ogoun = $imagePath;

        $ogunbook->save();

        // ✅ CORRECTION: Redirection vers 'creator.ogunbooks.index'
        return redirect()->route('creator.ogunbooks.index')->with('success', 'Livre créé avec succès !');
    }

    public function destroy($id)
    {
        $ogunbook = Ogunbook::findOrFail($id);
        
        // Supprimer l'image associée si elle existe
        if ($ogunbook->photo_couverture_ogoun) {
            Storage::disk('public')->delete($ogunbook->photo_couverture_ogoun);
        }

        $ogunbook->delete();

        // ✅ CORRECTION: Redirection vers 'creator.ogunbooks.index'
        return redirect()->route('creator.ogunbooks.index')->with('success', 'Livre supprimé avec succès.');
    }

    // N'oubliez pas d'ajouter les méthodes 'edit' et 'update' si elles ne sont pas déjà là
    // pour que la ressource soit complète.
    public function edit(Ogunbook $ogunbook)
    {
        $categories = Categorie::all();
        return view('ogunbook.edit', compact('ogunbook', 'categories'));
    }

    public function update(Request $request, Ogunbook $ogunbook)
    {
        $request->validate([
            'nom_book' => 'required|string|max:255',
            'description' => 'required|string',
            'nombre_de_chapitre' => 'required|integer|min:0',
            'prix_book' => 'required|numeric|min:0',
            'id_categorie' => 'required|exists:categories,id_categorie',
            'image_book' => 'nullable|image|max:2048',
        ]);

        $imagePath = $ogunbook->photo_couverture_ogoun;
        if ($request->hasFile('image_book')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image_book')->store('books', 'public');
        }

        $ogunbook->update([
            'titre_ogoun' => $request->nom_book,
            'description_ogoun' => $request->description,
            'nombre_de_chapitre' => $request->nombre_de_chapitre,
            'prix_ogoun' => $request->prix_book,
            'id_categorie' => $request->id_categorie,
            'photo_couverture_ogoun' => $imagePath,
        ]);

        // ✅ CORRECTION: Redirection vers 'creator.ogunbooks.index'
        return redirect()->route('creator.ogunbooks.index')->with('success', 'Livre mis à jour avec succès !');
    }
}
