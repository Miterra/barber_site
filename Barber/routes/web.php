<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RdvController;

Route::get('/', function () {return view('index');})->name('accueil');

Route::get('/rendez-vous', function () {return view('rdv_calendar');})->name('rdv');

Route::get('/contact', function () {return view('contact');})->name('contact');

Route::get('/photos', function () {return view('photos');})->name('photos');


Route::get('/rdv/available-hours', [RdvController::class, 'getAvailableHours'])->name('rdv.available-hours');

Route::get('/rdv/events', [RdvController::class, 'events'])->name('rdv.events');

Route::post('/rdv', [RdvController::class, 'store'])->name('rdv.store');