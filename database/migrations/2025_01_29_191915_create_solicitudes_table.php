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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('nombreEmpresa');
            $table->string('actividad');
            $table->string('cif');
            $table->string('provincia');
            $table->string('localidad');
            $table->string('email');
            $table->enum('titularidad', ['publica', 'privada']);
            $table->time('horario_comienzo');
            $table->time('horario_fin');
            $table->timestamps();

            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('centro_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('centro_id')->references('id')->on('centros')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
