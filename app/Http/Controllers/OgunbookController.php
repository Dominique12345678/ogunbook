<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ogunbook;
use App\Models\Categorie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class OgunbookController extends Controller
{
    /**
     * Affiche la liste des livres du créateur connecté
     */
    public function index()
    {
        $idCreateur = Session::get('createur_id'); // ID du créateur connecté
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
        $ogunbook->nom_book = $request->nom_book;
        $ogunbook->description = $request->description;
        $ogunbook->nombre_de_chapitre = $request->nombre_de_chapitre;
        $ogunbook->prix_book = $request->prix_book;
        $ogunbook->id_categorie = $request->id_categorie;
        $ogunbook->id_createur = Session::get('createur_id');
        $ogunbook->image_book = $imagePath;

        $ogunbook->save();

        return redirect()->route('ogunbook.index')->with('success', 'Livre créé avec succès !');
        
    }
    public function destroy($id)
{
    $ogunbook = Ogunbook::findOrFail($id);
    $ogunbook->delete();

    return redirect()->route('ogunbook.index')->with('success', 'Livre supprimé avec succès.');

}


}
