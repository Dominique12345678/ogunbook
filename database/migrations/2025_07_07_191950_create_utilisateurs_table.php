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
    Schema::create('utilisateurs', function (Blueprint $table) {
        $table->id('id_utilisateur');
        $table->string('nom_utilisateurs');
        $table->string('prenoms_utilisateurs');
        $table->string('pseudo_utilisateurs')->unique();
        $table->string('num_tel_utilisateur')->nullable();
        $table->enum('genre_utilisateur', ['Homme', 'Femme', 'Ne pas préciser'])->default('Ne pas préciser');
        $table->date('date_de_naissance_utilisateur')->nullable();
        $table->string('email_utilisateur')->unique();
        $table->string('mot_de_passe_utilisateur');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
