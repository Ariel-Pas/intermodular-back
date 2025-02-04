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
        Schema::create('solicitud_ciclo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ciclo_id');
            $table->unsignedBigInteger('solicitud_id');
            $table->timestamps();
            $table->integer('numero_puestos'); // atributo de la tabla pivot
            $table->foreign('ciclo_id')->references('id')->on('ciclos')->onDelete('cascade'); // ver si existe la tabla ciclos
            $table->foreign('solicitud_id')->references('id')->on('solicitudes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_ciclo');
    }
};
