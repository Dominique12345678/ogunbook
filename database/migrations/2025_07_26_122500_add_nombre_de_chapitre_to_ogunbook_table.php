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
        Schema::table('ogunbook', function (Blueprint $table) {
            $table->integer('nombre_de_chapitre')->default(0)->after('prix_ogoun'); // Ajoute la colonne après 'prix_ogoun'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ogunbook', function (Blueprint $table) {
            $table->dropColumn('nombre_de_chapitre');
        });
    }
};