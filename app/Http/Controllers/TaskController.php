<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User; // Importation du modèle User
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Affiche la liste des tâches
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
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
            'status' => 'required|in:à faire,en cours,terminé',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id', // Validation ajoutée
        ]);

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
            'status' => 'required|in:à faire,en cours,terminé',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id', // Validation ajoutée
        ]);

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
