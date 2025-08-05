<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class LoginUserController extends Controller
{
    /**
     * Affiche le tableau de bord pour les utilisateurs connectés.
     */
    public function index()
    {
        // ✅ CORRECTION: Utilise la méthode Auth::check() pour vérifier la connexion.
        // C'est la méthode standard de Laravel.
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['auth' => 'Veuillez vous connecter.']);
        }

        // TODO: Vérifiez que le modèle Ogunbook est bien importé.
        // use App\Models\Ogunbook;
        $ogunbooks = Ogunbook::latest()->take(12)->get();
        return view('userogunbook', compact('ogunbooks'));
    }

    /**
     * Affiche le formulaire de connexion.
     */
    public function showLoginForm()
    {
        return view('loginuser');
    }

    /**
     * Gère la tentative de connexion de l'utilisateur.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // ✅ CORRECTION: Utilise Auth::attempt() pour authentifier l'utilisateur.
        // On spécifie que le champ d'email dans la base de données est 'email_utilisateur'.
        // La méthode Auth::attempt gère la vérification du mot de passe et l'initialisation de la session pour vous.
        if (Auth::attempt([
            'email_utilisateur' => $credentials['email'],
            'password' => $credentials['password']
        ])) {
            // La connexion a réussi.
            // La session est automatiquement gérée par Laravel.
            $request->session()->regenerate();
            
            // Redirige l'utilisateur vers la route prévue ou la route de fallback.
            return redirect()->intended(route('userogunbook'));
        }

        // Si la connexion a échoué.
        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ])->onlyInput('email');
    }

    /**
     * Déconnecte l'utilisateur.
     */
    public function logout(Request $request)
    {
        // Ajout d'une méthode pour la déconnexion.
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Redirige vers la page de connexion
    }
}
