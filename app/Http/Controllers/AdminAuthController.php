<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Createur;
use App\Models\Ogunbook;
use App\Models\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('loginadmin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // ✅ Ajout d'un dd() pour vérifier l'authentification
            dd('Admin authentifié !', Auth::guard('admin')->user());

            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
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
        $totalUsers = User::count();
        $totalCreators = Createur::count();
        $totalOgunbooks = Ogunbook::count();
        $totalChapters = Chapitre::count();

        $users = User::all(); 

        return view('admin.dashboard', compact('users', 'totalUsers', 'totalCreators', 'totalOgunbooks', 'totalChapters'));
    }

    public function showProfile()
    {
        return view('admin.profile');
    }
}
