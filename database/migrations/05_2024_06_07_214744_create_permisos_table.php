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
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->date('fecha');
            $table->time('entrada');
            $table->time('salida');
            $table->string('motivo');
            $table->string('estatus')->default('pendiente');
            $table->foreignId('validador_id')->constrained('usuarios');
            $table->foreignId('validador2_id')->constrained('usuarios');
            $table->string('tipo')->nullable();
            $table->string('auto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};
