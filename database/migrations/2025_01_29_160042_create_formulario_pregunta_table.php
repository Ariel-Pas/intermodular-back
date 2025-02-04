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
        Schema::create('formulario_pregunta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregunta_id');
            $table->unsignedBigInteger('formulario_id');
            $table->timestamps();

            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');
            $table->foreign('formulario_id')->references('id')->on('formularios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario_pregunta');
    }
};
