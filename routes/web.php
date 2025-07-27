<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Contrôleurs
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCreatorController; // Importation nécessaire
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\CreateurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\OgunbookController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\UserLivreController;
use App\Http\Controllers\UserOgunbookController;
use App\Http\Controllers\UtilisateurController;

/*
|--------------------------------------------------------------------------
| Routes Publiques
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('accueil');
Route::get('/a-propos', function () { return view('a-propos'); })->name('a-propos');
Route::get('/contact', function () { return view('contact'); })->name('contact');
Route::get('/faq', function () { return view('faq'); })->name('faq');

// ✅ Route pour la page d'accueil créateur
Route::get('/accueilcreator', function () {
    return view('accueilcreator');
})->name('accueilcreator');


/*
|--------------------------------------------------------------------------
| Routes d'Authentification (Utilisateurs, Créateurs, Admins)
|--------------------------------------------------------------------------
*/

// Utilisateurs
Route::get('/register', [UtilisateurController::class, 'create'])->name('registeruser');
Route::post('/register', [UtilisateurController::class, 'store'])->name('registeruser.store');
Route::get('/login', [LoginUserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginUserController::class, 'login']);


// Créateurs
Route::get('/register-creator', [CreateurController::class, 'create'])->name('registercreator');
Route::post('/register-creator', [CreateurController::class, 'store'])->name('registercreator.store');
Route::get('/login-creator', [CreateurController::class, 'showLoginForm'])->name('logincreator');
Route::post('/login-creator', [CreateurController::class, 'login'])->name('logincreator.post');

// Admin
Route::get('/login-admin', [AdminAuthController::class, 'showLoginForm'])->name('loginadmin');
Route::post('/login-admin', [AdminAuthController::class, 'login'])->name('admin.login');


/*
|--------------------------------------------------------------------------
| Routes Protégées
|--------------------------------------------------------------------------
*/

// Routes pour les utilisateurs connectés
Route::middleware(['auth'])->group(function () {
    Route::get('/user/accueil', [UserOgunbookController::class, 'index'])->name('user.accueil');
    Route::get('/user/ogunbook', [UserOgunbookController::class, 'index'])->name('userogunbook');
    Route::get('/user/livre/{id}', [UserLivreController::class, 'show'])->name('user.livre.show');
    
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});

// Routes pour les créateurs connectés
Route::middleware(['auth:createur'])->prefix('creator')->name('creator.')->group(function () {
    Route::get('/dashboard', [CreateurController::class, 'showDashboard'])->name('dashboard');

    // ✅ Routes pour le profil du créateur
    Route::get('/profile', [CreateurController::class, 'showProfile'])->name('profile');
    Route::get('/profile/edit', [CreateurController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [CreateurController::class, 'updateProfile'])->name('profile.update');
});


// Routes pour les administrateurs connectés
Route::middleware(['auth:admin', 'AdminAuth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminAuthController::class, 'showDashboard'])->name('dashboard');
    Route::get('/profile', [AdminAuthController::class, 'showProfile'])->name('profile');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Gestion des catégories
    Route::resource('categories', AdminCategoryController::class);
    
    // ✅ Nouvelles routes pour la gestion des utilisateurs et créateurs
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/creators', [AdminCreatorController::class, 'index'])->name('creators.index');

    // Bannissement d'utilisateurs
    Route::post('/users/{user}/ban', [AdminUserController::class, 'ban'])->name('users.ban');
    Route::post('/users/{user}/unban', [AdminUserController::class, 'unban'])->name('users.unban');
});


/*
|--------------------------------------------------------------------------
| Routes pour les Ogunbooks & Nouveaux Chapitres (CRUD)
|--------------------------------------------------------------------------
*/
Route::resource('ogunbooks', OgunbookController::class);

// ✅ Nouvelles routes pour les chapitres avec un préfixe différent
Route::prefix('my-chapters')->name('my_chapters.')->group(function () {
    Route::get('/', [ChapitreController::class, 'index'])->name('index');
    Route::get('/new', [ChapitreController::class, 'create'])->name('create');
    Route::post('/', [ChapitreController::class, 'store'])->name('store');
    Route::get('/{ogunbook}/add', [ChapitreController::class, 'showAddChapterForm'])->name('add_to_book');
    Route::get('/{chapitre}', [ChapitreController::class, 'show'])->name('show');
    Route::get('/{chapitre}/edit', [ChapitreController::class, 'edit'])->name('edit');
    Route::put('/{chapitre}', [ChapitreController::class, 'update'])->name('update');
    Route::delete('/{chapitre}', [ChapitreController::class, 'destroy'])->name('destroy');
});

Route::get('/livre/{id}', [ChapitreController::class, 'showLivre'])->name('livre.show');


/*
|--------------------------------------------------------------------------
| Routes pour le Paiement
|--------------------------------------------------------------------------
*/
Route::post('/paiement/process', [PaiementController::class, 'process'])->name('paiement.process');
Route::get('/livre/{id}/download-zip', [PaiementController::class, 'downloadZip'])->name('livre.download.zip');
Route::post('/paiement/simuler', function (Request $request) {
    session(['paiement_effectue_' . $request->book_id => true]);
    return response()->json(['success' => true, 'message' => 'Paiement simulé avec succès']);
})->name('paiement.simulate');
Route::post('/paiement/webhook', [PaiementController::class, 'handleWebhook']);

// ✅ Route de test temporaire
Route::get('/test-route', function () {
    return 'La route de test fonctionne !';
});
