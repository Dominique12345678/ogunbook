<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function ban(User $user)
    {
        $user->update(['banned_at' => now()]);
        return back()->with('success', 'Utilisateur banni avec succès.');
    }

    public function unban(User $user)
    {
        $user->update(['banned_at' => null]);
        return back()->with('success', 'Utilisateur débanni avec succès.');
    }
}
