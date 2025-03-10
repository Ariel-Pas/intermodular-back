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
            $table->text('descripcion')->nullable();
            $table->string('email')->unique();
            $table->string('direccion')->nullable();
            $table->double('coordX')->nullable();
            $table->double('coordY')->nullable();
            $table->string('horario_manana');
            $table->string('horario_tarde');
            $table->boolean('finSemana')->nullable();
            $table->string('imagen')->nullable();
            $table->double('puntuacion_profesor')->nullable();
            $table->double('puntuacion_alumno')->nullable();
            $table->integer('vacantes')->nullable();
            $table->foreignId('town_id')->constrained();
            $table->string('token')->unique()->nullable();
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
