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
        Schema::create('centro_ciclo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('centro_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ciclo_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centro_ciclo');
    }
};
