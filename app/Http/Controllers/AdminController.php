<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Affiche le tableau de bord de l'administrateur
    public function index()
    {
        // Récupère tous les projets
        $projects = Project::all();
        // Récupère tous les utilisateurs sauf les administrateurs
        $users = User::where('role', '!=', 'admin')->get();
        // Récupère les utilisateur en attente de validation
        $pendingUsers = User::where('role', 'inconnu')->get();
        // utilisateurs valider
        $validatedUsers = User::where('role', '!=', 'inconnu')->get();
        // Retourne la vue du tableau de bord avec les projets et les utilisateurs
        return view('admin.dashboard', compact('projects', 'users','pendingUsers','validatedUsers'));
    }

    // Crée un nouveau projet
    public function createProject(Request $request)
    {
        // Crée le projet avec les données du formulaire
        $project = Project::create($request->all());
        // Redirige vers la page précédente avec un message de succès
        return redirect()->back()->with('success', 'Projet créé avec succès.');
    }

    // Assigne un chef de projet à un projet spécifique
    public function assignProjectManager($projectId, $userId)
    {
        // Récupère le projet par son ID
        $project = Project::find($projectId);
        // Récupère l'utilisateur par son ID
        $user = User::find($userId);

        // Vérifie si le projet et l'utilisateur existent
        if ($project && $user) {
            // Assigne l'utilisateur comme chef de projet
            $project->project_manager_id = $userId;
            // Sauvegarde les modifications du projet
            $project->save();
        }

        // Redirige vers la page précédente avec un message de succès
        return redirect()->back()->with('success', 'Chef de projet assigné.');
    }
}
