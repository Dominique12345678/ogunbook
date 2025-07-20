<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Models\Ogunbook;

class PaiementController extends Controller
{
    public function process(Request $request)
    {
        // Validation
        $request->validate([
            'book_id' => 'required|exists:ogunbook,id_book',
            'payment_method' => 'required|in:flooz,tmoney,visa',
            'phone' => 'required|string'
        ]);

        // Simulation de paiement (en réalité, vous auriez un appel API ici)
        $livre = Ogunbook::find($request->book_id);
        
        // Enregistrement factice du paiement
        $paiement = new Paiement([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'montant' => $livre->prix_book,
            'methode' => $request->payment_method,
            'statut' => 'complet', // Statut simulé comme réussi
            'reference' => 'SIM' . time() // Référence factice
        ]);
        $paiement->save();

        // Stockage en session que l'utilisateur a "payé"
        session(['paiement_effectue_' . $request->book_id => true]);

        return redirect()->route('livre.show', $request->book_id)
             ->with('success', 'Paiement simulé avec succès ! Vous pouvez maintenant accéder aux chapitres.');
    }
    public function downloadZip($id)
{
    $livre = Ogunbook::with('chapitres')->findOrFail($id);
    
    $zip = new \ZipArchive();
    $zipName = 'chapitres_' . $livre->nom_book . '.zip';
    $zipPath = storage_path('app/public/' . $zipName);
    
    if ($zip->open($zipPath, \ZipArchive::CREATE) === TRUE) {
        foreach ($livre->chapitres as $chapitre) {
            $filePath = storage_path('app/public/' . $chapitre->fichier_chapitre);
            if (file_exists($filePath)) {
                $zip->addFile($filePath, basename($filePath));
            }
        }
        $zip->close();
    }
    
    return response()->download($zipPath)->deleteFileAfterSend(true);
}

}