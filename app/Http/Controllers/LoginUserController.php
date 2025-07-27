<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Utiliser le modèle User qui est configuré pour la table utilisateurs

class LoginUserController extends Controller
{
    public function index()
    {
        // Cette méthode semble être pour une page d'accueil utilisateur, pas directement liée à la connexion.
        // Je suppose que 'userogunbook' est la vue principale après connexion.
        // Assurez-vous que l'utilisateur est authentifié via le guard 'web'
        if (!Auth::guard('web')->check()) {
            return redirect()->route('login')->withErrors(['auth' => 'Veuillez vous connecter.']);
        }

        // Récupérer les ogunbooks si nécessaire pour cette vue
        // use App\Models\Ogunbook; // Assurez-vous d'importer Ogunbook si vous l'utilisez ici
        // $ogunbooks = Ogunbook::latest()->take(12)->get();
        return view('userogunbook'); // ou view('userogunbook', compact('ogunbooks')); si vous les utilisez
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

        // Utilisation de Auth::attempt() pour authentifier l'utilisateur
        // Laravel va automatiquement vérifier le hachage du mot de passe
        // et gérer la session si les identifiants sont corrects.
        // Le guard 'web' est le guard par défaut pour le modèle User.
        if (Auth::guard('web')->attempt(['email_utilisateur' => $request->email, 'password' => $request->password], $request->remember)) {
            $request->session()->regenerate(); // Régénère la session pour éviter les attaques de fixation de session

            return redirect()->intended(route('user.accueil')); // Redirige vers la page prévue ou user.accueil par défaut
        }

        // Si l'authentification échoue
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->withInput($request->only('email')); // Garde l'email dans le champ du formulaire
    }

    // Vous pourriez avoir une méthode logout ici si elle n'est pas déjà dans les routes
    // public function logout(Request $request)
    // {
    //     Auth::guard('web')->logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/');
    // }
}