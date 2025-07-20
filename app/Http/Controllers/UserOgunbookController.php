<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ogunbook;

class UserOgunbookController extends Controller
{
    public function index()
{
    $ogunbooks = Ogunbook::with(['categorie', 'createur'])->latest()->take(12)->get();
    return view('userogunbook', compact('ogunbooks'));
}
}
