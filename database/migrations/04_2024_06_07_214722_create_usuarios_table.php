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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('no_trabajador')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('departamento_id')->constrained('departamentos');
            $table->foreignId('puesto_id')->constrained('puestos');
            $table->foreignId('horario_id')->constrained('horarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
