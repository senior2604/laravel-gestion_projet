<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChefDeProjetController extends Controller
{
    // Afficher le tableau de bord du chef de projet
    public function index()
    {
        // Récupérez les projets associés au chef de projet connecté
        $projects = Project::where('project_manager_id', Auth::id())->get();

        // Récupérez les tâches associées à chaque projet
        $tasks = Task::whereIn('project_id', $projects->pluck('id'))->get();

        // Préparer les membres de l'équipe pour chaque projet
        $teamMembers = [];
        foreach ($projects as $project) {
            $teamMembers[$project->id] = $project->teamMembers; // Associe les membres de l'équipe au projet
        }

        // Retournez la vue avec les projets, les tâches associées et les membres de l'équipe
        return view('chefdeprojet.dashboard', compact('projects', 'tasks', 'teamMembers'));
    }

    // Mettre à jour le statut du projet
    public function updateProjectStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:actif,suspendu,terminé'
        ]);

        $project = Project::findOrFail($id);
        $project->status = $request->status;
        $project->save();

        return redirect()->route('chefdeprojet.dashboard')->with('success', 'Statut du projet mis à jour avec succès.');
    }
}
