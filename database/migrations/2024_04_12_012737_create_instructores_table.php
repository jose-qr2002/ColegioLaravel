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
        Schema::create('instructores', function (Blueprint $table) {
            $table->id();
            $table->string('dni', 8)->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('celular');
            $table->string('direccion');
            $table->enum('profesion', ['Ingeniería de Sistemas', 'Desarrollo de Software', 'Ingeniería en Inteligencia Artificial']);
            $table->enum('grado_instruccion', ['Técnico', 'Licenciado']);
            $table->integer('anios_experiencia');
            $table->decimal('salario', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructores');
    }
};
