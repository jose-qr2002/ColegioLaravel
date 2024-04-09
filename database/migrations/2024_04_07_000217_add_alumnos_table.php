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
        DB::table('alumnos')->insert([
            'dni' => '40633367',
            'nombres' => 'Juan',
            'apellidos' => 'Perez',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('alumnos')->insert([
            'dni' => '40633368',
            'nombres' => 'Alan',
            'apellidos' => 'Garcia',
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
