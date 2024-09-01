<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class MembreController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->user()->id;

        // Récupération des projets via la table pivot project_user
        $projects = Project::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        // Récupération des tâches associées à l'utilisateur directement dans la table tasks
        $tasks = Task::where('user_id', $userId)->get();

        return view('membre.dashboard', compact('projects', 'tasks'));
    }
}

