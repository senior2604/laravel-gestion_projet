<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Colonne auto-incrémentée pour l'identifiant
            $table->string('name'); // Nom de la tâche
            $table->text('description')->nullable(); // Description de la tâche
            $table->enum('status', ['en_attente', 'en_cours', 'terminée'])->default('en_attente'); // Statut de la tâche en français
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Clé étrangère vers la table des projets
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null'); // Clé étrangère vers la table des utilisateurs, nullable
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
