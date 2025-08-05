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

    // Méthode showAddChapterForm()
    public function showAddChapterForm(Ogunbook $ogunbook)
    {
        // Vérifier que l'Ogunbook appartient bien au créateur connecté
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

        // Logique pour le message de succès personnalisé
        $ogunbook = Ogunbook::find($request->id_book);
        $message = 'Chapitre ajouté avec succès.';
        if ($ogunbook && $ogunbook->chapitres->count() === 1) { // Si c'est le premier chapitre
            $message = 'Premier chapitre ajouté avec succès !';
        }

        // ✅ CORRECTION: Utilise la route 'chapters.index'
        return redirect()->route('chapters.index')->with('success', $message);
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

        if ($request->hasFile('fichier_chapitre')) {
            if ($chapitre->fichier_chapitre) {
                // Assurez-vous que le chemin de suppression est correct
                // Si vous avez utilisé move(public_path('chapitres'), ...), la suppression doit être relative à public_path
                // ou utiliser Storage::delete(public_path('chapitres') . '/' . $chapitre->fichier_chapitre);
                // Si vous avez utilisé Storage::store('chapitres', 'public'), alors Storage::disk('public')->delete() est correct.
                Storage::disk('public')->delete($chapitre->fichier_chapitre);
            }
            $fichierNom = $request->file('fichier_chapitre')->store('chapitres', 'public');
        } else {
            $fichierNom = $chapitre->fichier_chapitre;
        }

        $chapitre->update([
            'nom_chapitre' => $request->nom_chapitre,
            'fichier_chapitre' => $fichierNom,
            'id_ogoun' => $request->id_book,
        ]);

        // ✅ CORRECTION: Utilise la route 'chapters.index'
        return redirect()->route('chapters.index')->with('success', 'Chapitre mis à jour avec succès.');
    }

    public function destroy(Chapitre $chapitre)
    {
        if ($chapitre->fichier_chapitre) {
            // Assurez-vous que le chemin de suppression est correct
            Storage::disk('public')->delete($chapitre->fichier_chapitre);
        }
        $chapitre->delete();

        // ✅ CORRECTION: Utilise la route 'chapters.index'
        return redirect()->route('chapters.index')->with('success', 'Chapitre supprimé avec succès.');
    }

    public function showLivre($id)
    {
        $livre = Ogunbook::with('createur', 'categorie', 'chapitres')->findOrFail($id);
        return view('userchapitre', compact('livre'));
    }
}
