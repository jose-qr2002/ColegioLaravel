<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';
    protected $fillable = ['dni', 'nombres', 'apellidos'];

    public function matriculas() {
        return $this->hasMany(Matricula::class, 'idAlumno');
    }
}
