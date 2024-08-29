<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Gère une demande de connexion à l'application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        // Récupère les informations d'identification (email et mot de passe) depuis la requête
        $credentials = $request->only('email', 'password');

        // Tente de connecter l'utilisateur avec les informations fournies
        if (Auth::attempt($credentials)) {
            // Si l'authentification est réussie, redirige l'utilisateur en fonction de son rôle
            $user = Auth::user();
            return $this->authenticated($request, $user);
        }

        // En cas d'échec, redirige l'utilisateur vers la page précédente avec un message d'erreur
        return redirect()->back()->withErrors([
            'email' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
        ]);
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        // Invalide la session actuelle et génère un nouveau token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige l'utilisateur vers la page de connexion après déconnexion
        return redirect()->route('login');
    }

    /**
     * Gère la redirection après l'authentification en fonction du rôle de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user): RedirectResponse
    {
        // Redirige l'utilisateur vers la page appropriée en fonction de son rôle
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'chefprojet') {
            return redirect()->route('chefprojet.dashboard');
        } elseif ($user->role === 'membre') {
            return redirect()->route('membre.dashboard');
        }

        // Si le rôle ne correspond à aucun des cas ci-dessus, redirige vers la page d'accueil
        return redirect()->route('home');
    }
}
