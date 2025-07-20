<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ogunbook;

class HomeController extends Controller
{
    public function index()
    {
        $ogunbooks = Ogunbook::latest()->take(12)->get(); // récupère les 12 derniers livres
        return view('accueil', compact('ogunbooks')); // passe la variable à la vue
    }
}
