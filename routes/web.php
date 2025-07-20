<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateurController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminCategoryController; // Assurez-vous de bien l'importer

// Page d'accueil
Route::get('/', function () {
    return view('accueil');
})->name('accueil');

// Page d'accueil du créateur
Route::get('/accueilcreator', function () {
    return view('accueilcreator');
})->name('accueilcreator');

// Formulaire d’inscription créateur
Route::get('/registercreator', [CreateurController::class, 'create'])->name('registercreator');
Route::post('/registercreator', [CreateurController::class, 'store'])->name('registercreator.store');

// Connexion créateur
Route::get('/connexion-createur', [CreateurController::class, 'showLoginForm'])->name('logincreator');
Route::post('/connexion-createur', [CreateurController::class, 'login'])->name('logincreator.post');

// Tableau de bord du créateur
Route::get('/dashboard-createur', function () {
    return view('dashboardcreator');
})->name('dashboardcreator');

// Pages OgunBook et Chapitre
Route::get('/ogunbook', function () {
    return 'Page OgunBook';
})->name('ogunbook.index');

Route::get('/chapitre', function () {
    return 'Page Chapitre';
})->name('chapitre.index');

// === ADMIN ===

// Connexion admin
Route::get('/loginadmin', [AdminAuthController::class, 'showLoginForm'])->name('loginadmin');
Route::post('/loginadmin', [AdminAuthController::class, 'login'])->name('admin.login');

// Dashboard admin
Route::get('/dashboard-admin', [AdminAuthController::class, 'showDashboard'])->name('dashboardadmin');

// Déconnexion admin
Route::get('/logout-admin', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Connexion utilisateur (à implémenter plus tard)
Route::get('/loginuser', function () {
    return view('loginuser');
})->name('loginuser');

// Profil admin
Route::get('/admin/profile', [AdminAuthController::class, 'showProfile'])->name('admin.profile');

// Gestion des catégories admin
Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');

use App\Http\Controllers\OgunbookController;

Route::middleware(['web'])->group(function () {
    Route::get('/ogunbooks', [OgunbookController::class, 'index'])->name('ogunbook.index');
    Route::get('/ogunbooks/create', [OgunbookController::class, 'create'])->name('ogunbook.create');
    Route::post('/ogunbooks', [OgunbookController::class, 'store'])->name('ogunbook.store');
});


Route::get('/ogunbook', [OgunbookController::class, 'index'])->name('ogunbook.index');
Route::get('/ogunbook/create', [OgunbookController::class, 'create'])->name('ogunbook.create');
Route::post('/ogunbook', [OgunbookController::class, 'store'])->name('ogunbook.store');
Route::get('/ogunbook/{id}/edit', [OgunbookController::class, 'edit'])->name('ogunbook.edit');
Route::put('/ogunbook/{id}', [OgunbookController::class, 'update'])->name('ogunbook.update');
Route::delete('/ogunbook/{id}', [OgunbookController::class, 'destroy'])->name('ogunbook.destroy');

use App\Http\Controllers\ChapitreController;

Route::get('/chapitre', [ChapitreController::class, 'index'])->name('chapitre.index');
Route::get('/chapitre/create', [ChapitreController::class, 'create'])->name('chapitre.create');
Route::post('/chapitre', [ChapitreController::class, 'store'])->name('chapitre.store');
Route::delete('/chapitre/{id}', [ChapitreController::class, 'destroy'])->name('chapitre.destroy');
Route::get('/chapitre/{id}/edit', [ChapitreController::class, 'edit'])->name('chapitre.edit');
use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/connexion-createur'); // Redirection après déconnexion
})->name('logout');

use App\Http\Controllers\UtilisateurController;

Route::get('/registeruser', [UtilisateurController::class, 'create'])->name('registeruser');
Route::post('/registeruser', [UtilisateurController::class, 'store'])->name('registeruser.store');


use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('accueil');
use App\Http\Controllers\UserOgunbookController;

Route::get('/user/accueil', [UserOgunbookController::class, 'index'])->name('user.accueil');

use App\Http\Controllers\LoginUserController;

Route::get('/loginuser', [LoginUserController::class, 'showLoginForm'])->name('loginuserform');

Route::post('/loginuser', [LoginUserController::class, 'login'])->name('loginuser');



Route::get('/user/ogunbook', [UserOgunbookController::class, 'index'])->name('userogunbook');


use App\Http\Controllers\UserLivreController;

Route::get('/user/livre/{id}', [UserLivreController::class, 'show'])->name('user.livre.show');
// routes/web.php
Route::get('/livre/{id}', [ChapitreController::class, 'showLivre'])->name('livre.show');

// routes/web.php
Route::post('/paiement/process', [PaiementController::class, 'process'])
     ->name('paiement.process');

// routes/web.php
Route::post('/paiement/process', function (Request $request) {
    // Logique de paiement ici
    return back()->with('success', 'Paiement reçu !');
})->name('paiement.process');
Route::get('/livre/{id}/download-zip', [PaiementController::class, 'downloadZip'])
     ->name('livre.download.zip');

     Route::post('/paiement/simuler', function (Request $request) {
    // Enregistrement factice en session
    session(['paiement_effectue_' . $request->book_id => true]);
    
    return response()->json([
        'success' => true,
        'message' => 'Paiement simulé avec succès'
    ]);
})->name('paiement.simulate');