<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rdv;
use App\Models\Disponibilite;

class AdminController extends Controller
{
    // Login admin
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Vous n’êtes pas admin.']);
            }
        }

        return back()->withErrors(['email' => 'Identifiants incorrects.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('accueil');
    }

    // Dashboard admin
    public function dashboard()
    {
        // Récupère tous les rendez-vous, triés par date puis par heure
        $rdvs = Rdv::orderBy('date', 'asc')->orderBy('heure', 'asc')->get();
        $dispos = Disponibilite::orderBy('date', 'asc')->orderBy('start_time', 'asc')->get();

        return view('admin.dashboard', compact('rdvs', 'dispos'));
    }

    // Supprimer un RDV
    public function deleteRdv($id)
    {
        $rdv = Rdv::findOrFail($id);
        $rdv->delete();
        return back()->with('success', 'Rendez-vous supprimé.');
    }

    // Ajouter une disponibilité
    public function disponibilitesStore(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Disponibilite::create($request->only(['date', 'start_time', 'end_time']));
        return back()->with('success', 'Disponibilité ajoutée.');
    }

    public function deleteDisponibilite($id)
    {
        $dispo = Disponibilite::findOrFail($id);
        $dispo->delete();
        return back()->with('success', 'Disponibilité supprimée.');
    }
}