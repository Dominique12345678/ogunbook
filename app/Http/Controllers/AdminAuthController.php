<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; // Assurez-vous que votre modèle Admin est correctement défini et importé
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Importation de la façade Session

class AdminAuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion de l'administrateur.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Retourne la vue du formulaire de connexion admin
        return view('loginadmin'); // Vue : resources/views/loginadmin.blade.php
    }

    /**
     * Traite la tentative de connexion de l'administrateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Valide les données d'entrée (email et mot de passe)
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Recherche l'administrateur dans la base de données par son email
        $admin = Admin::where('email', $request->email)->first();

        // Vérifie si un administrateur a été trouvé et si le mot de passe correspond
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Connexion réussie :
            // Stocke les informations de connexion dans la session
            Session::put('admin_logged_in', true); // Indicateur que l'admin est connecté
            Session::put('admin_id', $admin->id);   // ID de l'admin connecté
            Session::put('admin_name', $admin->name); // Nom de l'admin connecté

            // Redirige l'administrateur vers le tableau de bord
            return redirect()->route('dashboardadmin');
        }

        // Échec de connexion :
        // Redirige l'utilisateur vers le formulaire de connexion avec des erreurs
        return back()->withErrors([
            'email' => 'Adresse email ou mot de passe incorrect.',
        ])->withInput(); // Conserve les anciennes entrées (sauf le mot de passe)
    }

    /**
     * Affiche le tableau de bord de l'administrateur.
     * Cette méthode inclut la logique de protection.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showDashboard()
    {
        // Vérifie si la session 'admin_logged_in' existe et est vraie
        if (!Session::has('admin_logged_in') || Session::get('admin_logged_in') !== true) {
            // Si l'administrateur n'est PAS connecté, le redirige vers la page de connexion
            return redirect()->route('loginadmin');
        }

        // Si l'administrateur est connecté, affiche la vue du tableau de bord
        return view('admin.dashboard');
    }

    /**
     * Déconnecte l'administrateur en supprimant les informations de session.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Oublie toutes les informations de session relatives à l'admin
        Session::forget(['admin_logged_in', 'admin_id', 'admin_name']);

        // Redirige l'administrateur vers la page de connexion
        return redirect()->route('loginadmin');
    }
}
