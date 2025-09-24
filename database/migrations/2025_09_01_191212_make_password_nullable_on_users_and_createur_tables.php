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
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->string('mot_de_passe_utilisateur')->nullable()->change();
        });

        Schema::table('createur', function (Blueprint $table) {
            $table->string('mot_de_passe_createur')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->string('mot_de_passe_utilisateur')->nullable(false)->change();
        });

        Schema::table('createur', function (Blueprint $table) {
            $table->string('mot_de_passe_createur')->nullable(false)->change();
        });
    }
};