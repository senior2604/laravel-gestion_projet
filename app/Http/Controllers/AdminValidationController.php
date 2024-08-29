<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminValidationController extends Controller
{
    // Affiche la liste des utilisateurs en attente de validation
    public function index()
    {
        $users = User::where('validated', 0)->where('role', 'inconnu')->get();
        return view('admin.validation.index', compact('users'));
    }

    // Valide un utilisateur
    public function validateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->validated = 1;
        $user->role = 'membre'; // ou tout autre rôle par défaut
        $user->save();

        // Envoyer un email de confirmation ici, si nécessaire

        return redirect()->route('admin.validation.index')->with('success', 'Utilisateur validé avec succès.');
    }
}
