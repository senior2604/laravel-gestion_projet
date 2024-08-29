<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValidatedToUsersTable extends Migration
{
    /**
     * Exécutez les migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('validated')->default(false); // Ajoute la colonne `validated` avec une valeur par défaut de `false`
        });
    }

    /**
     * Réglez les migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('validated'); // Supprime la colonne `validated` si la migration est annulée
        });
    }
}
