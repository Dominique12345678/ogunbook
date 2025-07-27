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
        Schema::table('createur', function (Blueprint $table) {
            $table->string('type_createur')->after('genre'); // Ajoute la colonne après 'genre'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('createur', function (Blueprint $table) {
            $table->dropColumn('type_createur');
        });
    }
};