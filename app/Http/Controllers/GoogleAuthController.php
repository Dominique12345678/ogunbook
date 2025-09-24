<?php

namespace App\Http\Controllers;

use App\Models\Createur;
use App\Models\Utilisateur;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirige l'utilisateur vers la page d'authentification de Google.
     */
    public function redirectToGoogle($role)
    {
        if (!in_array($role, ['user', 'creator'])) {
            abort(404);
        }
        session(['socialite_role' => $role]);
        return Socialite::driver('google')->redirect();
    }

    /**
     * Gère la réponse de Google après l'authentification.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $role = session('socialite_role', 'user');

            Log::info('Callback Google reçu pour le rôle : ' . $role, ['email' => $googleUser->getEmail()]);

            if ($role === 'creator') {
                $user = Createur::where('email_createur', $googleUser->getEmail())
                    ->orWhere('google_id', $googleUser->getId())
                    ->first();

                if (!$user) {
                    $user = Createur::create([
                        'nom_createur' => $googleUser->user['family_name'] ?? '',
                        'prenoms_createur' => $googleUser->user['given_name'] ?? '',
                        'pseudo_createur' => $googleUser->getNickname() ?? explode('@', $googleUser->getEmail())[0] . rand(100, 999),
                        'email_createur' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'type_createur' => 'independant',
                    ]);
                }

                Auth::guard('createur')->login($user);
                session()->regenerate();

                // ✅ Ligne modifiée pour le test du créateur
                return redirect()->route('creator.dashboard');

            } else { // Cas pour le rôle 'user'
                $user = Utilisateur::where('email_utilisateur', $googleUser->getEmail())
                    ->orWhere('google_id_utilisateur', $googleUser->getId())
                    ->first();

                if (!$user) {
                    $user = Utilisateur::create([
                        'nom_utilisateurs' => $googleUser->user['family_name'] ?? '',
                        'prenoms_utilisateurs' => $googleUser->user['given_name'] ?? '',
                        'pseudo_utilisateurs' => $googleUser->getNickname() ?? explode('@', $googleUser->getEmail())[0] . rand(100, 999),
                        'email_utilisateur' => $googleUser->getEmail(),
                        'google_id_utilisateur' => $googleUser->getId(),
                    ]);
                }

                Auth::login($user);
                session()->regenerate();

                // ✅ Ligne modifiée pour le test de l'utilisateur
                return 'Connexion Utilisateur réussie ! Vous pouvez fermer cette page.';
            }

        } catch (Exception $e) {
            Log::error('Erreur lors du callback Google: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return redirect('/login')->with('error', 'Impossible de se connecter avec Google pour le moment.');
        }
    }
}
