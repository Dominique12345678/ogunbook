<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UtilisateurController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function create()
    {
        return view('registeruser');
    }

    /**
     * Gère la soumission du formulaire d'inscription.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom_utilisateurs' => 'required|string|max:255',
            'prenoms_utilisateurs' => 'required|string|max:255',
            'pseudo_utilisateurs' => 'required|string|unique:utilisateurs,pseudo_utilisateurs|max:255',
            'date_de_naissance_utilisateur' => 'required|date',
            // ✅ CORRECTION: Les valeurs de la règle de validation 'in' ont été mises à jour.
            // Elles correspondent maintenant exactement aux valeurs de l'ENUM de la base de données.
            'genre_utilisateur' => ['required', Rule::in(['Homme', 'Femme', 'Ne pas préciser'])],
            'email_utilisateur' => 'required|string|email|unique:utilisateurs,email_utilisateur|max:255',
            'num_tel_utilisateur' => 'required|string|max:20',
            'mot_de_passe_utilisateur' => 'required|string|min:8|confirmed',
        ]);

        // Création de l'utilisateur
        $user = Utilisateur::create([
            'nom_utilisateurs' => $request->nom_utilisateurs,
            'prenoms_utilisateurs' => $request->prenoms_utilisateurs,
            'pseudo_utilisateurs' => $request->pseudo_utilisateurs,
            'date_de_naissance_utilisateur' => $request->date_de_naissance_utilisateur,
            'genre_utilisateur' => $request->genre_utilisateur,
            'email_utilisateur' => $request->email_utilisateur,
            'num_tel_utilisateur' => $request->num_tel_utilisateur,
            'mot_de_passe_utilisateur' => Hash::make($request->mot_de_passe_utilisateur),
        ]);

        // Redirection après l'inscription
        // Vous pouvez choisir de le connecter automatiquement ou de le rediriger vers la page de connexion.
        // auth()->login($user);
        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès !');
    }
}
