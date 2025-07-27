<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ogunbook', function (Blueprint $table) {
            $table->id('id_ogoun');
            $table->string('titre_ogoun');
            $table->text('description_ogoun');
            $table->string('photo_couverture_ogoun')->nullable();
            $table->string('tags_ogoun')->nullable();
            $table->decimal('prix_ogoun', 8, 2);
            $table->foreignId('id_createur')->constrained('createur');
            $table->foreignId('id_categorie')->constrained('categories');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ogunbook');
    }
};