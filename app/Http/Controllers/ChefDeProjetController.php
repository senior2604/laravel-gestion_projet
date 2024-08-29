<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChefDeProjetController extends Controller
{
    // Afficher le tableau de bord du chef de projet
    public function index()
    {
        // Logique pour récupérer les informations pertinentes pour le tableau de bord
        return view('chefdeprojet.dashboard');
    }
}
