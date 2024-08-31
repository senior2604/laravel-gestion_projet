<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectManagerIdToProjectMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_members', function (Blueprint $table) {
            $table->unsignedBigInteger('project_manager_id')->nullable();

            // Ajoutez éventuellement une clé étrangère si nécessaire
            // $table->foreign('project_manager_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_members', function (Blueprint $table) {
            $table->dropColumn('project_manager_id');
        });
    }
}
