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
        DB::table('matriculas')->insert([
            'idAlumno' => 1,
            'idCurso' => 1,
            'anioAcad' => '2024-I'
        ]);

        DB::table('matriculas')->insert([
            'idAlumno' => 1,
            'idCurso' => 1,
            'anioAcad' => '2024-II'
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
