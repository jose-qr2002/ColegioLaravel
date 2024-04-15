<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructores';
    protected $fillable = [
        'dni', 
        'nombres', 
        'apellidos',
        'celular',
        'grado_instruccion',
        'anios_experiencia',
        'direccion',
        'profesion',
        'salario'
    ];
}
