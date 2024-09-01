<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function showCalendar(Request $request)
    {
        // Récupération de la date actuelle ou d'une date passée dans la requête
        $date = $request->input('date', Carbon::now()->format('Y-m-d'));

        // Création d'une instance Carbon pour la date fournie
        $carbonDate = Carbon::createFromFormat('Y-m-d', $date);

        // Exemple de récupération du mois et de l'année
        $mois = $carbonDate->format('m');
        $annee = $carbonDate->format('Y');

        // Exemple d'utilisation des méthodes de Carbon
        $debutMois = $carbonDate->startOfMonth();
        $finMois = $carbonDate->endOfMonth();

        // Pour afficher les données dans la vue
        return view('calendar.show', compact('mois', 'annee', 'debutMois', 'finMois'));
    }
}
