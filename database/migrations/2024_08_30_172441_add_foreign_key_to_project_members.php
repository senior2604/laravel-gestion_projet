<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProjectMembers extends Migration
{
    public function up()
    {
        Schema::table('project_members', function (Blueprint $table) {
            $table->unsignedBigInteger('project_manager_id')->change();

            // Ajouter la clé étrangère
            $table->foreign('project_manager_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('project_members', function (Blueprint $table) {
            // Supprimer la clé étrangère
            $table->dropForeign(['project_manager_id']);
        });
    }
}
