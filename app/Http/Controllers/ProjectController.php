<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; // Assurez-vous que le modèle Project existe
use App\Models\User; // Assurez-vous que le modèle User existe

class ProjectController extends Controller
{
    // Affiche la liste des projets
    public function index()
    {
        $projects = Project::all(); // Récupère tous les projets
        return view('projects.index', compact('projects')); // Renvoie la vue avec les projets
    }

    // Affiche le formulaire de création d'un projet
    public function create()
    {
        $users = User::all(); // Récupère tous les utilisateurs pour la sélection
        return view('projects.create', compact('users')); // Renvoie la vue de création de projet
    }

    // Enregistre un nouveau projet
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:actif,suspendu,terminer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'budget' => 'nullable|numeric',
            'project_manager' => 'required|exists:users,id',
            'team_members' => 'nullable|array',
            'team_members.*' => 'exists:users,id',
        ]);

        $project = Project::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'budget' => $validatedData['budget'],
            'user_id' => $validatedData['project_manager'],
        ]);



        $project->users()->attach($validatedData['team_members']); // Associe les membres d'équipe au projet

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès.');
    }

    // Affiche un projet spécifique
    public function show($id)
    {
        $project = Project::findOrFail($id); // Trouve le projet ou lance une exception si non trouvé
        return view('projects.show', compact('project')); // Renvoie la vue de détail du projet
    }

    // Affiche le formulaire d'édition d'un projet
    public function edit($id)
    {
        $project = Project::findOrFail($id); // Trouve le projet ou lance une exception si non trouvé
        $users = User::all(); // Récupère tous les utilisateurs pour la sélection
        return view('projects.edit', compact('project', 'users')); // Renvoie la vue d'édition du projet
    }

    // Met à jour un projet existant
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:actif,suspendu,terminer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'budget' => 'nullable|numeric',
            'user_id' => 'required|exists:users,id',
            'team_members' => 'nullable|array',
            'team_members.*' => 'exists:users,id',
        ]);

        $project = Project::findOrFail($id); // Trouve le projet ou lance une exception si non trouvé
        $project->update($validatedData); // Met à jour les informations du projet

        $project->users()->sync($validatedData['team_members']); // Met à jour les membres d'équipe du projet

        return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    // Supprime un projet
    public function destroy($id)
    {
        $project = Project::findOrFail($id); // Trouve le projet ou lance une exception si non trouvé
        $project->users()->detach(); // Détache les membres d'équipe
        $project->delete(); // Supprime le projet

        return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès.');
    }
}
