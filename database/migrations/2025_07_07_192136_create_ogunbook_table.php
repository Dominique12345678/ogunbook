<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('ogunbook', function (Blueprint $table) {
            $table->dropColumn('statut');
        });
    }

    public function down(): void {
        Schema::table('ogunbook', function (Blueprint $table) {
            $table->enum('statut', ['Publié', 'En attente', 'Archivé'])->default('En attente');
        });
    }
};
