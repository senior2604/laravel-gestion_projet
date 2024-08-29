<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        // Récupérer les statistiques nécessaires
        $data = [
            'totalProjects' => Project::count(),
            'totalTasks' => Task::count(),
            'completedTasks' => Task::where('status', 'completed')->count(),
            'activeProjects' => Project::where('status', 'actif')->count(),
            'suspendedProjects' => Project::where('status', 'suspendu')->count(),
        ];

        // Passer les données à la vue
        return view('statistics.index', $data);
    }
}
