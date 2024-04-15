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
        DB::table('instructores')->insert([
            'dni' => '02314891',
            'nombres' => 'Juan Gabriel',
            'apellidos' => 'Perez Gonzales',
            'profesion' => 'Desarrollo de Software',
            'celular' => '945521571',
            'direccion' => 'Asociación Las Americas Mz 12 Lt 4',
            'grado_instruccion' => 'Técnico',
            'anios_experiencia' => 1,
            'salario' => 1300,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('instructores')->insert([
            'dni' => '05455134',
            'nombres' => 'Eduardo Jimenez',
            'apellidos' => 'Perez Gonzales',
            'profesion' => 'Ingeniería de Sistemas',
            'celular' => '975134871',
            'direccion' => 'Asociación Quiñonez Mz 4 Lt 2',
            'grado_instruccion' => 'Licenciado',
            'anios_experiencia' => 2,
            'salario' => 1500,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
