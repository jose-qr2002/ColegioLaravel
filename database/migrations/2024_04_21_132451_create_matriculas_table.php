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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCurso');
            $table->unsignedBigInteger('idAlumno');
            $table->enum('anioAcad',['2023-I','2023-II','2024-I','2024-II']);
            $table->foreign('idCurso')->references('id')->on('cursos')->onDelete('no action')->onUpdate('no action');
            $table->foreign('idAlumno')->references('id')->on('alumnos')->onDelete('no action')->onUpdate('no action');
            $table->unique(['idCurso', 'idAlumno','anioAcad']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
