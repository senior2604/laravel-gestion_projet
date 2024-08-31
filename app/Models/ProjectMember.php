<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    use HasFactory;

    // Nom de la table associé au modèle
    protected $table = 'project_members'; // Assurez-vous que le nom de la table correspond à votre base de données

    // Les attributs qui sont massivement assignables
    protected $fillable = [
        'project_id',
        'user_id',
        'project_manager_id',
    ];

    // Définir les relations

    /**
     * Récupérer le projet associé au membre.
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    /**
     * Récupérer l'utilisateur associé au membre.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Récupérer le gestionnaire de projet associé au membre.
     */
    public function projectManager()
    {
        return $this->belongsTo(User::class, 'project_manager_id');
    }
}
