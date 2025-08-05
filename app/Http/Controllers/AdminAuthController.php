<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Createur;
use App\Models\Ogunbook;
use App\Models\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\AdminChecker; // Import de la nouvelle classe de service

class AdminAuthController extends Controller
{
    // Le constructeur n'est plus nécessaire car nous allons vérifier l'accès manuellement dans chaque méthode
    // public function __construct()
    // {
    //     $this->middleware('AdminAuth')->only(['showDashboard', 'showProfile']);
    // }

    public function showLoginForm()
    {
        return view('loginadmin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showDashboard()
    {
        // On utilise la nouvelle classe de service pour la vérification
        $redirect = AdminChecker::check();
        if ($redirect) {
            return $redirect;
        }

        // Le reste de la logique de la méthode...
        $totalUsers = User::count();
        $totalCreators = Createur::count();
        $totalOgunbooks = Ogunbook::count();
        $totalChapters = Chapitre::count();
        $users = User::all();

        return view('admin.dashboard', compact('users', 'totalUsers', 'totalCreators', 'totalOgunbooks', 'totalChapters'));
    }

    public function showProfile()
    {
        // On utilise la nouvelle classe de service pour la vérification
        $redirect = AdminChecker::check();
        if ($redirect) {
            return $redirect;
        }

        // Le reste de la logique de la méthode...
        return view('admin.profile');
    }
}
