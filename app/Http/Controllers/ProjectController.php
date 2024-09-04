<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('manager')->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::all();
        return view('projects.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:actif,suspendu,terminé',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'budget' => 'nullable|numeric',
            'project_manager_id' => 'required|exists:users,id',
            'team_members' => 'required|array',
            'team_members.*' => 'exists:users,id'
        ]);

        $project = Project::create($validatedData);

        $project->teamMembers()->sync($request->team_members);

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès.');
    }


    public function show($id)
    {
        // Récupérer le projet par ID
        $project = Project::findOrFail($id);

        // Récupérer les membres de l'équipe du projet
        $teamMembers = $project->teamMembers; // Utilise la relation définie dans le modèle Project

        return view('projects.show', compact('project', 'teamMembers'));
    }


    public function edit($id)
    {
    $project = Project::findOrFail($id);
    $users = User::all();

    // Format des dates pour les champs de formulaire
    $project->start_date = $project->start_date->toDateString();
    $project->end_date = $project->end_date->toDateString();
    $projectMembers = DB::table('project_user')
        ->where('project_id', $id)
        ->pluck('user_id')
        ->toArray();

    return view('projects.edit', compact('project', 'users','projectMembers'));
    }


    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:actif,suspendu,terminé',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'budget' => 'required|numeric',
            'project_manager_id' => 'required|exists:users,id',
            'team_members' => 'required|array',
            'team_members.*' => 'exists:users,id'
        ]);

        $project->update($validatedData);
        $project->teamMembers()->sync($request->team_members);

        return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès.');
    }
}
