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
        Schema::create('suspenciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->date('h_inicio');
            $table->date('h_fin');
            $table->string('motivo');
            $table->string('estatus')->default('pendiente');
            $table->foreignId('validador_id')->constrained('usuarios');
            $table->date('p_inicio');
            $table->date('p_fin');
            $table->string('tipo')->nullable();
            $table->string('materia')->nullable();
            $table->string('grupo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suspenciones');
    }
};
