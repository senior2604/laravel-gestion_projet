<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil en fonction du rôle de l'utilisateur.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si l'utilisateur est authentifié
        if (!$user) {
            return redirect()->route('login');
        }

        // Appeler la méthode pour afficher le tableau de bord approprié
        return $this->getDashboardView($user);
    }

    /**
     * Renvoie la vue du tableau de bord en fonction du rôle de l'utilisateur.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return \Illuminate\View\View
     */
    private function getDashboardView(Authenticatable $user)
    {
        // Assurez-vous que vous utilisez des vues valides et non des redirections ici
        switch ($user->role) {
            case 'admin':
                return view('admin.dashboard'); // Vue du tableau de bord de l'admin
            case 'chef_de_projet':
                return view('chefdeprojet.dashboard'); // Vue du tableau de bord du chef de projet
            case 'membre':
                // Récupérer les projets de l'utilisateur
                $projets = Project::where('user_id', $user->id)->get();
                return view('membre.dashboard');//, ['projets' => $projets]); // Vue du tableau de bord du membre
            case 'inconnu':
            default:
                // Retourner une vue d'erreur pour les utilisateurs dont le rôle est inconnu
                return view('auth.pending'); // Vue d'attente pour la validation du compte
        }
    }
}
