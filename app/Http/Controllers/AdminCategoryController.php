<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_categorie' => 'required|string|max:255|unique:categories,nom_categorie',
        ]);

        Categorie::create([
            'nom_categorie' => $request->nom_categorie,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }
}
