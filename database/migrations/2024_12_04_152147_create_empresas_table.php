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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('cif')->unique();
            $table->text('descripcion');
            $table->string('email')->unique();
            $table->string('direccion');
            $table->double('coordX');
            $table->double('coordY');
            $table->string('horario_manana');
            $table->string('horario_tarde');
            $table->boolean('finSemana');
            $table->string('imagen')->nullable();
            $table->string('telefono');
            $table->double('puntuacion_profesor')->nullable();
            $table->double('puntuacion_alumno')->nullable();
            $table->integer('vacantes')->nullable();
            $table->foreignId('town_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
