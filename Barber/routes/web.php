<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RdvController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Pages publiques
|--------------------------------------------------------------------------
*/
Route::get('/', function () { 
    return view('index'); 
})->name('accueil');

Route::get('/rendez-vous', function () { 
    return view('rdv_calendar'); 
})->name('rdv');

Route::get('/contact', function () { 
    return view('contact'); 
})->name('contact');

Route::get('/photos', function () { 
    return view('photos'); 
})->name('photos');

/*
|--------------------------------------------------------------------------
| Routes RDV (clients)
|--------------------------------------------------------------------------
*/
Route::get('/rdv/events', [RdvController::class, 'events'])
    ->name('rdv.events');

Route::post('/rdv', [RdvController::class, 'store'])
    ->name('rdv.store');

/*
|--------------------------------------------------------------------------
| Routes Admin
|--------------------------------------------------------------------------
*/

// Login admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Dashboard (middleware pour vérifier si admin)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // RDV routes
    Route::delete('/admin/rdv/{id}', [AdminController::class, 'deleteRdv'])->name('admin.deleteRdv');

    // Disponibilités routes
    Route::post('/admin/disponibilites', [AdminController::class, 'disponibilitesStore'])->name('admin.disponibilitesStore');
    Route::delete('/admin/disponibilites/{id}', [AdminController::class, 'deleteDisponibilite'])->name('admin.deleteDisponibilite');
});

/*
|--------------------------------------------------------------------------
| Profil utilisateur (Breeze)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';