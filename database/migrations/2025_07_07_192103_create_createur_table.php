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
    Schema::create('createur', function (Blueprint $table) {
        $table->id('id_createur');
        $table->string('nom_createur');
        $table->string('prenoms_createur');
        $table->string('pseudo_createur')->unique();
        $table->date('date_de_naissance')->nullable();
        $table->enum('genre', ['Homme', 'Femme', 'Ne pas préciser'])->default('Ne pas préciser');
        $table->string('email_createur')->unique();
        $table->string('num_tel_createur')->nullable();
        $table->string('mot_de_passe_createur');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('createur');
    }
};
