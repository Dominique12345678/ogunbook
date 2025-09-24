<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Remplacez 'createurs' par 'createur'
        Schema::table('createur', function (Blueprint $table) {
            // Ajout de la colonne google_id après la colonne email_createur
            // J'ai utilisé 'email_createur' car c'est le nom de la colonne email dans votre table 'createur'
            $table->string('google_id')->nullable()->after('email_createur');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remplacez 'createurs' par 'createur'
        Schema::table('createur', function (Blueprint $table) {
            $table->dropColumn('google_id');
        });
    }
};
