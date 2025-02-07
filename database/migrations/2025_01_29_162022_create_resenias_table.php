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
        Schema::create('resenias', function (Blueprint $table) {
            $table->id();
            $table->string('respuesta');
            $table->date('fecha')->nullable();
            $table->unsignedBigInteger('pregunta_id');
            $table->unsignedBigInteger('formulario_id');
            $table->timestamps();

            // agregue empresa_id y centro_id
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('centro_id');

            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');
            $table->foreign('formulario_id')->references('id')->on('formularios')->onDelete('cascade');

            // agregue  $table->foreign de empresa_id y centro_id
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('centro_id')->references('id')->on('centros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resenias');
    }
};
