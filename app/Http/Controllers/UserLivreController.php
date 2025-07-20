<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ogunbook;

class UserLivreController extends Controller
{
    

public function show($id)
{
    $livre = Ogunbook::with('chapitres', 'createur', 'categorie')->findOrFail($id);
    return view('userchapitre', compact('livre'));
}

}
