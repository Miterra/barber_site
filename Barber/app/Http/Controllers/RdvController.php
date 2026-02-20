<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RdvConfirmation;
use App\Models\Rdv;

class RdvController extends Controller
{
    /**
     * Enregistrer un rendez-vous
     */
    public function store(Request $request)
    {
        // Validation des champs
        $request->validate([
            'prenom' => 'required|string|max:50',
            'email' => 'required|email',
            'date' => 'required|date',
            'heure' => 'required'
        ]);

        // Vérifier si le créneau est déjà réservé
        $exists = Rdv::where('date', $request->date)
                     ->where('heure', $request->heure)
                     ->exists();

        if ($exists) {
            return back()->with('error', 'Ce créneau est déjà réservé, veuillez en choisir un autre.');
        }

        // Enregistrer le rendez-vous
        Rdv::create([
            'prenom' => $request->prenom,
            'email' => $request->email,
            'date' => $request->date,
            'heure' => $request->heure
        ]);

        // Envoyer un email de confirmation (optionnel)
        Mail::to($request->email)->send(
            new RdvConfirmation($request->date, $request->heure, $request->prenom)
        );

        return back()->with('success', 'Rendez-vous confirmé !');
    }

    /**
     * Récupérer les heures disponibles pour le formulaire select
     */
    public function getAvailableHours(Request $request)
    {
        $request->validate([
            'date' => 'required|date'
        ]);

        $date = $request->date;

        // Toutes les heures possibles
        $allHours = [
            '08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30',
            '12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30',
            '16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30',
            '20:00','20:30','21:00','21:30','22:00','22:30'
        ];

        // Heures déjà réservées
        $takenHours = Rdv::where('date', $date)->pluck('heure')->toArray();

        // Différence => heures disponibles
        $availableHours = array_diff($allHours, $takenHours);

        return response()->json(array_values($availableHours));
    }

    /**
     * Retourne les rendez-vous pour FullCalendar
     */
    public function events()
    {
        $rdvs = Rdv::all();

        $events = $rdvs->map(function($rdv) {
            $start = $rdv->date . 'T' . $rdv->heure . ':00'; // début
            $endTime = date('H:i:s', strtotime($rdv->heure . ' +30 minutes'));
            $end = $rdv->date . 'T' . $endTime;

            return [
                'title' => $rdv->prenom ?? 'Client', // fallback
                'start' => $start,
                'end' => $end,
                'className' => 'reserved'
            ];
        });

        return response()->json($events);
    }
}