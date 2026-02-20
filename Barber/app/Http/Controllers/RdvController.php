<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rdv;
use Illuminate\Support\Facades\Mail;
use App\Mail\RdvConfirmation;

class RdvController extends Controller
{
    // Retourne les événements pour FullCalendar
    public function events()
    {
        $rdvs = Rdv::all();
        $events = [];

        foreach ($rdvs as $rdv) {

            $start = $rdv->date . 'T' . $rdv->heure;

            // 30 MINUTES EXACTES
            $end = date('Y-m-d\TH:i:s', strtotime($start . ' +30 minutes'));

            $events[] = [
                'title' => $rdv->prenom,
                'start' => $start,
                'end'   => $end,
                'color' => '#ff4d4f',
                'classNames' => ['reserved']
            ];
        }

        return response()->json($events);
    }

    // Enregistrer un rendez-vous
    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'email' => 'required|email',
            'date' => 'required|date',
            'heure' => 'required',
        ]);

        // Vérifie si déjà réservé
        $exists = Rdv::where('date', $request->date)
            ->where('heure', $request->heure)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Ce créneau est déjà réservé.');
        }

        $rdv = Rdv::create([
            'prenom' => $request->prenom,
            'email' => $request->email,
            'date' => $request->date,
            'heure' => $request->heure,
        ]);

        // ENVOI MAIL
        Mail::to($request->email)->send(new RdvConfirmation($request->date, $request->heure));

        return back()->with('success', 'Rendez-vous enregistré !');
    }
}