<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Définir les attributs modifiables
    protected $fillable = [
        'name',
        'description',
        'status',
        'start_date',
        'end_date',
        'budget',
        'user_id',
    ];

    // Définir la table si elle est différente du nom par défaut
    protected $table = 'projects';

    // Définir les dates pour la gestion des timestamps
    protected $dates = ['start_date', 'end_date'];

    // Optionnel: définir la relation avec les utilisateurs
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // Optionnel: ajouter une méthode pour formater le statut
    public function getStatusAttribute($value)
    {
        return ucfirst($value); // Convertit le statut en majuscule
    }
    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members');
    }
}
