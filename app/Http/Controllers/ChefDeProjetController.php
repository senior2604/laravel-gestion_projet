<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;



class ChefDeProjetController extends Controller
{
    // Afficher le tableau de bord du chef de projet
    public function index()
    {
        // Récupérez les projets associés au chef de projet connecté
         $projects = Project::where('project_manager_id', auth()->user()->id)->get();

        // Retournez la vue avec les projets
        return view('chefdeprojet.dashboard', compact('projects'));
    }

}
