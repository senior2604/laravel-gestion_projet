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
    $projects = Project::where('user_id', $userId)->get();
    $tasks = Task::where('user_id', $userId)->get();

    return view('membre.dashboard', compact('projects', 'tasks'));
}

}
