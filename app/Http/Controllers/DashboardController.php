<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Affiche la vue du tableau de bord de l'administrateur.
     *
     * @return \Illuminate\View\View
     */
    public function getDashboardView()
    {
        // Récupérer les utilisateurs validés
        $validatedUsers = User::where('role', '!=', 'inconnu')->get();

        // Récupérer les utilisateurs non validés
        $pendingUsers = User::where('role', 'inconnu')->get();

        return view('admin.dashboard', [
            'validatedUsers' => $validatedUsers,
            'pendingUsers' => $pendingUsers,
        ]);
    }

}
