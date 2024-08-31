<?php

namespace App\Http\Controllers;

use App\Models\ProjectMember;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View; // Importer la classe View

class ProjectMemberController extends Controller
{
    // Afficher tous les membres d'un projet
    public function index($projectId): View
    {
        // Récupère les membres associés à un projet
        $members = ProjectMember::where('project_id', $projectId)->get();

        // Retourne la vue avec les membres
        return view('project_members.index', compact('members'));
    }

    // Ajouter un membre à un projet
    public function store(Request $request, $projectId)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'project_manager_id' => 'nullable|exists:users,id',
        ]);

        // Crée un nouvel enregistrement pour le membre du projet
        ProjectMember::create([
            'project_id' => $projectId,
            'user_id' => $request->user_id,
            'project_manager_id' => $request->project_manager_id,
        ]);

        return redirect()->route('projects.show', $projectId)
                         ->with('success', 'Membre ajouté au projet.');
    }

    // Supprimer un membre d'un projet
    public function destroy($projectId, $userId)
    {
        $member = ProjectMember::where('project_id', $projectId)
                               ->where('user_id', $userId)
                               ->first();

        if ($member) {
            $member->delete();
            return redirect()->route('projects.show', $projectId)
                             ->with('success', 'Membre supprimé du projet.');
        }

        return redirect()->route('projects.show', $projectId)
                         ->with('error', 'Membre non trouvé.');
    }
}
