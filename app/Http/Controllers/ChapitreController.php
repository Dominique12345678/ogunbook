<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Ogunbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChapitreController extends Controller
{
    public function index()
    {
        $createurId = Auth::guard('createur')->id();
        
        $livres = Ogunbook::where('id_createur', $createurId)->pluck('titre_ogoun', 'id_ogoun');
        
        $chapitres = Chapitre::whereIn('id_ogoun', $livres->keys())->with('ogunbook')->get();

        return view('chapitre.index', compact('chapitres'));
    }

    public function create()
    {
        $ogunbooks = Ogunbook::where('id_createur', Auth::guard('createur')->id())->get();
        return view('chapitre.create', compact('ogunbooks'));
    }

    public function showAddChapterForm(Ogunbook $ogunbook)
    {
        if ($ogunbook->id_createur !== Auth::guard('createur')->id()) {
            abort(403, 'Accès non autorisé à cet Ogunbook.');
        }
        return view('chapitre.add_chapter_form', compact('ogunbook'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_chapitre' => 'required|string|max:255',
            'fichier_chapitre' => 'required|file|mimes:pdf,zip,jpg,jpeg,png|max:10240',
            'id_book' => 'required|exists:ogunbook,id_ogoun',
        ]);

        $fichierNom = null;

        if ($request->hasFile('fichier_chapitre')) {
            $fichier = $request->file('fichier_chapitre');
            $fichierNom = time() . '_' . $fichier->getClientOriginalName();
            $fichier->move(public_path('chapitres'), $fichierNom);
        }

        Chapitre::create([
            'nom_chapitre' => $request->nom_chapitre,
            'fichier_chapitre' => $fichierNom,
            'id_ogoun' => $request->id_book,
        ]);

        $ogunbook = Ogunbook::find($request->id_book);
        $message = 'Chapitre ajouté avec succès.';
        if ($ogunbook && $ogunbook->chapitres->count() === 1) {
            $message = 'Premier chapitre ajouté avec succès !';
        }

        // ✅ CORRECTION: Utilise le nom de route complet
        return redirect()->route('creator.chapters.index')->with('success', $message);
    }

    public function show(Chapitre $chapitre)
    {
        return view('chapitre.show', compact('chapitre'));
    }

    public function edit(Chapitre $chapitre)
    {
        $livres = Ogunbook::where('id_createur', Auth::guard('createur')->id())->get();
        return view('chapitre.edit', compact('chapitre', 'livres'));
    }

    public function update(Request $request, Chapitre $chapitre)
    {
        $request->validate([
            'nom_chapitre' => 'required|string|max:255',
            'fichier_chapitre' => 'nullable|file|mimes:pdf,zip,jpg,jpeg,png|max:10240',
            'id_book' => 'required|exists:ogunbook,id_ogoun',
        ]);

        $fichierNom = $chapitre->fichier_chapitre;
        if ($request->hasFile('fichier_chapitre')) {
            if ($chapitre->fichier_chapitre) {
                Storage::disk('public')->delete($chapitre->fichier_chapitre);
            }
            $fichierNom = $request->file('fichier_chapitre')->store('chapitres', 'public');
        }

        $chapitre->update([
            'nom_chapitre' => $request->nom_chapitre,
            'fichier_chapitre' => $fichierNom,
            'id_ogoun' => $request->id_book,
        ]);

        // ✅ CORRECTION: Utilise le nom de route complet
        return redirect()->route('creator.chapters.index')->with('success', 'Chapitre mis à jour avec succès.');
    }

    public function destroy(Chapitre $chapitre)
    {
        if ($chapitre->fichier_chapitre) {
            Storage::disk('public')->delete($chapitre->fichier_chapitre);
        }
        $chapitre->delete();

        // ✅ CORRECTION: Utilise le nom de route complet
        return redirect()->route('creator.chapters.index')->with('success', 'Chapitre supprimé avec succès.');
    }

    public function showLivre($id)
    {
        $livre = Ogunbook::with('createur', 'categorie', 'chapitres')->findOrFail($id);
        return view('userchapitre', compact('livre'));
    }
}