<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('cursos')->insert([
            'codigo' => 'AB453',
            'nombre' => 'Lenguaje de Programación',
            'modalidad' => 'Semipresencial',
            'carrera' => 'Ingeniería de Software',
            'ciclo' => 'VI',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('cursos')->insert([
            'codigo' => 'ZY412',
            'nombre' => 'Arquitectura de Computadoras',
            'modalidad' => 'Presencial',
            'carrera' => 'Ingeniería de Soporte TI',
            'ciclo' => 'III',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('cursos')->where('codigo', 'AB453')->delete();
        DB::table('cursos')->where('codigo', 'ZY412')->delete();
    }
};
