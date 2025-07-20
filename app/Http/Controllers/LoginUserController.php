<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilisateur;

class LoginUserController extends Controller


{

    public function index()
{
    if (!session()->has('utilisateur_id')) {
        return redirect()->route('loginuserform')->withErrors(['auth' => 'Veuillez vous connecter.']);
    }

    $ogunbooks = Ogunbook::latest()->take(12)->get();
    return view('userogunbook', compact('ogunbooks'));
}

    public function showLoginForm()
    {
        return view('loginuser');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Vérifie si un utilisateur correspond dans la table personnalisée
        $utilisateur = Utilisateur::where('email_utilisateur', $request->email)->first();

        if (!$utilisateur || !Hash::check($request->password, $utilisateur->mot_de_passe_utilisateur)) {
            return back()->withErrors(['email' => 'Email ou mot de passe incorrect.'])->withInput();
        }

        // Authentifie manuellement
        session(['utilisateur_id' => $utilisateur->id_utilisateur, 'utilisateur_nom' => $utilisateur->nom_utilisateurs]);

        return redirect()->route('userogunbook'); // ou toute autre route après connexion
    }
}
