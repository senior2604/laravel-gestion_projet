<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Affiche le formulaire d'inscription
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function validateUser($id)
    {
        $user = User::find($id);

        if ($user) {
            // Si le rôle est inconnu, le définir en tant que membre
            if ($user->role === 'inconnu') {
                $user->role = 'membre';
            }
            else {

                $user->role = 'chef_de_projet';
            }

            // Mise à jour du statut de validation
            $user->validated = 1;
            $user->save();

            // Redirection après validation
            return redirect()->route('admin.dashboard')->with('success', 'Utilisateur validé avec succès.');
        }

        return redirect()->route('admin.dashboard')->with('error', 'Utilisateur non trouvé.');
    }


    // Crée un nouvel utilisateur
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'validated' => 0, // Par défaut, l'utilisateur n'est pas validé
            'role' => 'inconnu', // Rôle par défaut pour les nouveaux utilisateurs
        ]);

        return redirect()->route('account.pending')->with('success', 'Votre compte a été créé. Veuillez attendre la validation de l\'administrateur.');
    }

    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Authentifie l'utilisateur
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Vérifie si l'utilisateur est validé et a un rôle défini
            if ($user->validated == 0 || $user->role == 'inconnu') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('account.pending')->withErrors(['validated' => 'Votre compte doit être validé par l\'administrateur avant de pouvoir accéder à l\'application.']);
            }

            // Redirige l'utilisateur en fonction de son rôle
            return $this->redirectToDashboard($user);
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas.',
        ])->onlyInput('email');
    }

    // Déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Vous avez été déconnecté.');
    }

    // Mise à jour du rôle d'un utilisateur (accessible uniquement aux administrateurs)
    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'role' => 'required|in:admin,chef_de_projet,membre', // Rôles valides
        ]);

        // Vérifie que l'utilisateur n'a pas le rôle 'inconnu'
        if ($user->role === 'inconnu') {
            return redirect()->route('admin.dashboard')->withErrors(['role' => 'L\'utilisateur doit avoir un rôle défini avant de pouvoir être modifié.']);
        }

        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Le rôle de l\'utilisateur a été mis à jour.');
    }

    // Redirige l'utilisateur vers le dashboard correspondant à son rôle
    private function redirectToDashboard($user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'chef_de_projet':
                return redirect()->route('chefdeprojet.dashboard');
            case 'membre':
                return redirect()->route('membre.dashboard');
            case 'inconnu':
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors(['role' => 'Votre compte n\'a pas été validé ou votre rôle est inconnu.']);
        }
    }
}
