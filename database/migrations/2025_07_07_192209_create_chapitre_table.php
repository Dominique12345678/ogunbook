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
        Schema::create('chapitre', function (Blueprint $table) {
            $table->id('id_chapitre');
            $table->string('nom_chapitre');
            $table->string('image_chapitre')->nullable(); // Pour l'image de couverture du chapitre
            $table->string('fichier_chapitre')->nullable(); // Pour le fichier PDF/ZIP du chapitre
            $table->unsignedBigInteger('id_ogoun'); // ✅ Correction ici
            $table->foreign('id_ogoun')->references('id_ogoun')->on('ogunbook')->onDelete('cascade'); // ✅ Correction ici
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapitre');
    }
};