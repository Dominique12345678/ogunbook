<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Ogunbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChapitreController extends Controller
{
    public function index()
    {
        $createurId = Session::get('createur_id');
        $livres = Ogunbook::where('id_createur', $createurId)->pluck('nom_book', 'id_book');
        $chapitres = Chapitre::whereIn('id_book', $livres->keys())->with('book')->get();

        return view('chapitre.index', compact('chapitres'));
    }

    public function create()
    {
        $livres = Ogunbook::where('id_createur', Session::get('createur_id'))->get();
        return view('chapitre.create', compact('livres'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nom_chapitre' => 'required|string|max:255',
        'fichier_chapitre' => 'required|file|mimes:pdf,zip,jpg,jpeg,png|max:10240',
        'id_book' => 'required|exists:ogunbook,id_book',
    ]);

    $fichierNom = null;

    if ($request->hasFile('fichier_chapitre')) {
        $fichier = $request->file('fichier_chapitre');
        $fichierNom = time() . '_' . $fichier->getClientOriginalName();
        $fichier->move(public_path('chapitres'), $fichierNom); // stocké dans public/chapitres/
    }

    Chapitre::create([
        'nom_chapitre' => $request->nom_chapitre,
        'fichier_chapitre' => $fichierNom,
        'id_book' => $request->id_book,
    ]);

    return redirect()->route('chapitre.index')->with('success', 'Chapitre ajouté avec succès.');
}
public function showLivre($id)
{
    $livre = Ogunbook::with('createur', 'categorie', 'chapitres')->findOrFail($id);
    return view('userchapitre', compact('livre')); // Sans le préfixe 'user.'
}


}
