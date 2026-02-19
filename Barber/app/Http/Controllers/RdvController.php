<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RdvConfirmation;

class RdvController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'date' => 'required|date',
            'heure' => 'required'
        ]);

        Mail::to($request->email)->send(
            new RdvConfirmation($request->date, $request->heure)
        );

        return back()->with('success', 'Rendez-vous confirmé !');
    }
}

