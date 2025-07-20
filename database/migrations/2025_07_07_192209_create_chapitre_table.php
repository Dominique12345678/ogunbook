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
        $table->string('image_chapitre')->nullable();
        $table->text('chapitre');
        $table->unsignedBigInteger('id_book');
        $table->foreign('id_book')->references('id_book')->on('ogunbook')->onDelete('cascade');
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
