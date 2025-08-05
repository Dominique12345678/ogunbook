<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminChecker
{
    /**
     * Vérifie si l'utilisateur est un administrateur.
     * Si non, il redirige vers la page de connexion.
     *
     * @return RedirectResponse|void
     */
    public static function check(): RedirectResponse|null
    {
        // Vérifie si l'utilisateur est connecté en tant qu'administrateur
        if (!Auth::guard('admin')->check()) {
            // S'il n'est pas connecté, le rediriger vers la page de connexion
            return redirect()->route('loginadmin');
        }

        // Si l'utilisateur est connecté, ne rien faire
        return null;
    }
}
