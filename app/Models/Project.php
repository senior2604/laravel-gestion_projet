<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'status', 'start_date', 'end_date', 'budget', 'project_manager_id'
    ];

    public function manager()
    {
        return $this->belongsTo(User::class, 'project_manager_id');
    }

    public function teamMembers()
    {
        return $this->belongsToMany(User::class, 'project_user');
    }
    // Définissez les attributs qui doivent être castés en types spécifiques
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role');
    }

}
