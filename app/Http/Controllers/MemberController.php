<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class MemberController extends Controller
{
    // Affiche les projets assignés au membre de l'équipe connecté
    public function index()
    {
        $user = auth()->user();
        $projects = $user->projects()->with('tasks')->get();
        return view('member.index', compact('projects'));
    }

    // Affiche les détails d'un projet spécifique
    public function show($id)
    {
        $project = Project::with('tasks')->findOrFail($id);
        return view('member.show', compact('project'));
    }

    // Affiche les tâches assignées au membre de l'équipe dans un projet spécifique
    public function showTasks($projectId)
    {
        $project = Project::findOrFail($projectId);
        $tasks = $project->tasks()->where('assigned_to', auth()->id())->get();
        return view('member.tasks', compact('project', 'tasks'));
    }
}
