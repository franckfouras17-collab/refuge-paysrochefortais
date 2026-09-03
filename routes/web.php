<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DogController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// --- Site public ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/adoption/', [PageController::class, 'adoption'])->name('adoption');

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
    });
});
