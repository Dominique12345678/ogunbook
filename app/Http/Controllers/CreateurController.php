<?php

namespace App\Http\Controllers;

use App\Models\Createur;
use App\Models\Ogunbook; // Importation nécessaire
use App\Models\Chapitre; // Importation nécessaire
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateurController extends Controller
{
    public function create()
    {
        return view('registercreator');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'nomCreateur' => 'required|string|max:255',
            'dateNaissance' => 'required|date',
            'genre' => 'required|string',
            'typeCreateur' => 'required|string',
            'email' => 'required|email|unique:createur,email_createur',
            'telephone' => 'required|string|max:20',
            'motdepasse' => 'required|string|min:8',
        ]);

        Createur::create([
            'nom_createur' => $request->nom,
            'prenoms_createur' => $request->prenom,
            'pseudo_createur' => $request->nomCreateur,
            'date_de_naissance' => $request->dateNaissance,
            'genre' => $request->genre,
            'type_createur' => $request->typeCreateur,
            'email_createur' => $request->email,
            'num_tel_createur' => $request->telephone,
            'mot_de_passe_createur' => Hash::make($request->motdepasse),
        ]);

        return redirect()->route('logincreator')->with('success', 'Inscription réussie !');
    }


    public function showLoginForm()
    {
        return view('logincreator');
    }

    public function login(Request $request)
    {
        $request->validate([
            'identifiant' => 'required|string',
            'motdepasse' => 'required|string',
        ]);

        $createur = Createur::where('email_createur', $request->identifiant)
                    ->orWhere('num_tel_createur', $request->identifiant)
                    ->first();

        if ($createur && Hash::check($request->motdepasse, $createur->mot_de_passe_createur)) {
            Auth::guard('createur')->login($createur);
            $request->session()->regenerate();

            return redirect()->intended(route('creator.dashboard'));
        }

        return back()->withErrors(['identifiant' => 'Identifiants incorrects'])->withInput();
    }

    public function showProfile()
    {
        $createur = Auth::guard('createur')->user();
        return view('creator.profile', compact('createur'));
    }

    public function editProfile()
    {
        $createur = Auth::guard('createur')->user();
        return view('creator.edit_profile', compact('createur'));
    }

    public function updateProfile(Request $request)
    {
        $createur = Auth::guard('createur')->user();

        $request->validate([
            'nom_createur' => 'required|string|max:255',
            'prenoms_createur' => 'required|string|max:255',
            'pseudo_createur' => ['required', 'string', 'max:255', Rule::unique('createur')->ignore($createur->id_createur, 'id_createur')],
            'date_de_naissance' => 'required|date',
            'genre' => 'required|string',
            'type_createur' => 'required|string',
            'email_createur' => ['required', 'email', Rule::unique('createur')->ignore($createur->id_createur, 'id_createur')],
            'num_tel_createur' => 'required|string|max:20',
            'mot_de_passe_createur' => 'nullable|string|min:8|confirmed',
        ]);

        $data = $request->except('mot_de_passe_createur', 'mot_de_passe_createur_confirmation');

        if ($request->filled('mot_de_passe_createur')) {
            $data['mot_de_passe_createur'] = Hash::make($request->mot_de_passe_createur);
        }

        $createur->update($data);

        return redirect()->route('creator.profile')->with('success', 'Profil mis à jour avec succès !');
    }

    // ✅ Nouvelle méthode pour le tableau de bord du créateur
    public function showDashboard()
    {
        $createur = Auth::guard('createur')->user();
        $nombreLivres = Ogunbook::where('id_createur', $createur->id_createur)->count();
        
        // Récupérer les IDs des livres du créateur
        $livreIds = Ogunbook::where('id_createur', $createur->id_createur)->pluck('id_ogoun');
        $nombreChapitres = Chapitre::whereIn('id_ogoun', $livreIds)->count();

        return view('dashboardcreator', compact('nombreLivres', 'nombreChapitres'));
    }
}