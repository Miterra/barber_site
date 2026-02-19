<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RdvController;

Route::get('/', function () {return view('index');})->name('accueil');

Route::get('/rendez-vous', function () {return view('rdv');})->name('rdv');

Route::get('/contact', function () {return view('contact');})->name('contact');

Route::get('/photos', function () {return view('photos');})->name('photos');


Route::post('/rdv', [RdvController::class, 'store'])->name('rdv.store');
Route::post('/rdv', [RdvController::class, 'store'])->name('rdv.store');