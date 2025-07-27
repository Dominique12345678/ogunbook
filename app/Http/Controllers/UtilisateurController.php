<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UtilisateurController extends Controller
{
    public function create()
    {
        return view('registeruser');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom_utilisateurs' => 'required|string|max:255',
            'prenoms_utilisateurs' => 'required|string|max:255',
            'pseudo_utilisateurs' => 'required|string|max:255|unique:utilisateurs,pseudo_utilisateurs',
            'date_de_naissance_utilisateur' => 'required|date',
            'genre_utilisateur' => 'required|in:homme,femme,nepaspreciser',
            'email_utilisateur' => 'required|email|unique:utilisateurs,email_utilisateur',
            'num_tel_utilisateur' => 'required|string|max:20',
            'mot_de_passe_utilisateur' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Utilisateur::create([
            'nom_utilisateurs' => $request->nom_utilisateurs,
            'prenoms_utilisateurs' => $request->prenoms_utilisateurs,
            'pseudo_utilisateurs' => $request->pseudo_utilisateurs,
            'date_de_naissance_utilisateur' => $request->date_de_naissance_utilisateur,
            'genre_utilisateur' => $request->genre_utilisateur,
            'email_utilisateur' => $request->email_utilisateur,
            'num_tel_utilisateur' => $request->num_tel_utilisateur,
            'mot_de_passe_utilisateur' => Hash::make($request->mot_de_passe_utilisateur),
        ]);

        return redirect()->route('login')->with('success', 'Inscription réussie. Connectez-vous.');
    }
}
