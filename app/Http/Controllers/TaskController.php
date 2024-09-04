<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Models\ProjectMember;
use App\Models\ProjectUser;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Affiche la liste des tâches
    public function index()
    {
        $projects = Project::all();
        $tasks = Task::with('project')->get();
                $projects = Project::all();
        $users = User::all();

        return view('tasks.index', compact('tasks', 'projects', 'users'));
    }
    // Affiche le formulaire de création d'une tâche
    public function create()
    {
        $projects = Project::all(); // Charger les projets pour le formulaire de création
        $users = User::all(); // Charger les utilisateurs pour le formulaire de création
        return view('tasks.create', compact('projects', 'users'));
    }

    // Enregistre une nouvelle tâche dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:en_attente,en_cours,terminée',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Vérifier que l'utilisateur est membre du projet sélectionné
        if (!ProjectUser::where('project_id', $request->project_id)
                ->where('user_id', $request->user_id)
                ->exists()) {
    return redirect()->back()->withErrors(['user_id' => 'L\'utilisateur sélectionné n\'est pas membre du projet.']);
}


        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès.');
    }

    // Affiche le formulaire d'édition d'une tâche
    public function edit(Task $task)
    {
        $projects = Project::all(); // Charger les projets pour le formulaire d'édition
        $users = User::all(); // Charger les utilisateurs pour le formulaire d'édition
        return view('tasks.edit', compact('task', 'projects', 'users'));
    }

    // Met à jour une tâche existante dans la base de données
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:en_attente,en_cours,terminée',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Vérifier que l'utilisateur est membre du projet sélectionné
        if (!Projectuser::where('project_id', $request->project_id)
                          ->where('user_id', $request->user_id)
                          ->exists()) {
            return redirect()->back()->withErrors(['user_id' => 'L\'utilisateur sélectionné n\'est pas membre du projet.']);
        }

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    // Supprime une tâche de la base de données
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }
}
