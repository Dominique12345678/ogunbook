<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Createur; // Importation nécessaire
use Illuminate\Http\Request;

class AdminCreatorController extends Controller
{
    public function index()
    {
        $creators = Createur::all();
        return view('admin.creators.index', compact('creators'));
    }

    // Vous pouvez ajouter des méthodes pour bannir/débannir les créateurs ici si nécessaire
    // public function ban(Createur $creator) { ... }
    // public function unban(Createur $creator) { ... }
}