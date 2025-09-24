<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            // Ajoute une nouvelle colonne 'google_id_utilisateur'
            // Elle est de type string et peut être nulle pour les utilisateurs existants
            $table->string('google_id_utilisateur')->nullable()->after('email_utilisateur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            // Retire la colonne 'google_id_utilisateur' si la migration est annulée
            $table->dropColumn('google_id_utilisateur');
        });
    }
};
