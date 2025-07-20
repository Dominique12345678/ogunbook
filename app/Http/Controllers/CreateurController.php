<?php

namespace App\Http\Controllers;

use App\Models\Createur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    // On tente la connexion par email d’abord
    $createur = \App\Models\Createur::where('email_createur', $request->identifiant)
                ->orWhere('num_tel_createur', $request->identifiant)
                ->first();

    if ($createur && Hash::check($request->motdepasse, $createur->mot_de_passe_createur)) {
        // Stocker les infos du créateur manuellement si tu n'utilises pas Auth
        session(['createur_id' => $createur->id_createur]);

        return redirect()->route('dashboardcreator')->with('success', 'Connexion réussie !');
    }

    return back()->withErrors(['identifiant' => 'Identifiants incorrects'])->withInput();
}

}


