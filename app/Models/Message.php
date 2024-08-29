<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'user_id', 'project_id',
    ];

    /**
     * Relation avec l'utilisateur (un message appartient à un utilisateur).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec le projet (un message appartient à un projet).
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
