<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberDashboardController extends Controller
{
    // Afficher le tableau de bord du membre
    public function index()
    {
        // Vous pouvez récupérer les projets de l'utilisateur ou tout autre donnée pertinente ici
        return view('member.dashboard');
    }
}
