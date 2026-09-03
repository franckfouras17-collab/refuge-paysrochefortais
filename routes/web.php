<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// --- Site public ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/le-projet/', [PageController::class, 'projet'])->name('projet');
Route::get('/adoption/', [PageController::class, 'adoption'])->name('adoption');
Route::get('/capacite-extensions/', [PageController::class, 'capaciteExtensions'])->name('capacite-extensions');
Route::get('/financement/', [PageController::class, 'financement'])->name('financement');
Route::get('/budget-calendrier/', [PageController::class, 'budgetCalendrier'])->name('budget-calendrier');
Route::get('/nous-soutenir/', [PageController::class, 'nousSoutenir'])->name('nous-soutenir');
Route::get('/contact/', [PageController::class, 'contact'])->name('contact');
Route::get('/mentions-legales/', [PageController::class, 'mentionsLegales'])->name('mentions-legales');
Route::get('/confidentialite/', [PageController::class, 'confidentialite'])->name('confidentialite');
Route::get('/merci/', [PageController::class, 'merci'])->name('merci');

// --- Formulaires (envoi d'email) ---
Route::post('/contact/', [ContactController::class, 'sendContact'])->name('contact.send');
Route::post('/adoption/pre-inscription/', [ContactController::class, 'sendPreRegistration'])->name('adoption.preregister');

// --- Connexion / déconnexion admin ---
Route::get('/admin/connexion', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/connexion', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/deconnexion', [AuthController::class, 'logout'])->name('admin.logout');

// --- Espace admin (authentifié) ---
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Fiches chiens : admin + utilisateur
    Route::resource('chiens', DogController::class)->names('dogs')->parameters(['chiens' => 'dog']);
    Route::delete('chiens/{dog}/photos/{photo}', [DogController::class, 'destroyPhoto'])->name('dogs.photos.destroy');

    // Contenu du site en général : admin uniquement
    Route::middleware('admin')->group(function () {
        Route::get('contenu', [ContentController::class, 'index'])->name('content.index');
        Route::get('contenu/{content}', [ContentController::class, 'edit'])->name('content.edit');
        Route::put('contenu/{content}', [ContentController::class, 'update'])->name('content.update');

        Route::resource('utilisateurs', UserController::class)->names('users')->parameters(['utilisateurs' => 'user'])->except(['show']);
    });
});
