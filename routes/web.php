<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberDashboardController;
use App\Http\Controllers\ChefDeProjetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminValidationController;
use App\Http\Controllers\ProjectManagerController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CalendarController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route pour la page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Routes pour l'authentification (Laravel Breeze)
require __DIR__.'/auth.php';

// Routes pour les projets
Route::resource('projects', ProjectController::class);

// Routes pour les tâches
Route::resource('tasks', TaskController::class);

// Routes pour les messages
Route::resource('messages', MessageController::class);

// Routes pour les rapports
// Route::resource('reports', ReportController::class); // Décommenter si nécessaire

// Routes liées à l'utilisateur et au profil
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');

// Routes d'inscription et de connexion
Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserController::class, 'store']);
Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route pour les comptes en attente de validation
Route::get('/account/pending', function () {
    return view('auth.account_pending');
})->name('account.pending');

// Routes administratives protégées par les middlewares auth et admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Route pour afficher les utilisateurs en attente de validation
    Route::patch('/users/{id}/validate', [UserController::class, 'validateUser'])->name('users.validate');

    // Route pour valider un utilisateur
    Route::patch('/admin/users/{user}/validate', [AdminValidationController::class, 'validateUser'])->name('admin.validateUser');

    // Route pour supprimer un utilisateur
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');

    // Liste des utilisateurs en attente
    Route::get('/users/pending', [UserController::class, 'pendingUsers'])->name('users.pending');

    // Liste des utilisateurs validés
    Route::get('/users/validated', [UserController::class, 'validatedUsers'])->name('users.validated');
});

// Routes pour la gestion des rôles
Route::patch('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');

// Routes pour les tableaux de bord des membres et chefs de projet
Route::middleware(['auth', 'role:membre'])->group(function () {
    Route::get('/membre/dashboard', [MembreController::class, 'dashboard'])->name('membre.dashboard');
});

Route::middleware(['auth', 'role:chef_de_projet'])->group(function () {
    Route::get('/chefdeprojet/dashboard', [ChefDeProjetController::class, 'index'])->name('chefdeprojet.dashboard');
});

// Route pour le tableau de bord général
Route::get('/dashboard', [DashboardController::class, 'getDashboardView'])->name('dashboard');

// Routes pour les chefs de projet
Route::middleware('auth')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('project_manager.index');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('project_manager.show');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('project_manager.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('project_manager.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('project_manager.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('project_manager.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('project_manager.destroy');

    Route::get('/projects/{projectId}/tasks/create', [ProjectController::class, 'createTask'])->name('project_manager.create_task');
    Route::post('/projects/{projectId}/tasks', [ProjectManagerController::class, 'storeTask'])->name('project_manager.store_task');
    Route::get('/projects/{projectId}/tasks/{taskId}/edit', [ProjectController::class, 'editTask'])->name('project_manager.edit_task');
    Route::put('/projects/{projectId}/tasks/{taskId}', [ProjectController::class, 'updateTask'])->name('project_manager.update_task');
    Route::delete('/projects/{projectId}/tasks/{taskId}', [ProjectController::class, 'destroyTask'])->name('project_manager.destroy_task');
});

// Routes pour les membres de l'équipe
Route::middleware('auth')->group(function () {
    Route::get('/member/projects', [MemberController::class, 'index'])->name('member.index');
    Route::get('/member/projects/{id}', [MemberController::class, 'show'])->name('member.show');
    Route::get('/member/projects/{projectId}/tasks', [MemberController::class, 'showTasks'])->name('member.show_tasks');
});
Route::get('/statistiques', [StatisticsController::class, 'index'])->name('statistics.index');

Route::resource('projects', ProjectController::class);
Route::post('/admin/create-project', [AdminController::class, 'createProject'])->name('admin.createProject');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');


Route::get('/calendar', [CalendarController::class, 'showCalendar'])->name('calendar.show');


Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
