<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Relation avec le rôle de chef de projet
    public function managedProjects()
    {
        return $this->hasMany(ProjectManager::class);
    }

    // Relation avec les projets en tant que membre
    public function projectMemberships()
    {
        return $this->hasMany(ProjectMember::class);
    }
}
