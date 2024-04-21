<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    protected $table = 'matriculas';
    protected $fillable = ['id','idAlumno','idCurso','anioAcad'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class,'idAlumno');
    }
    public function curso()
    {
        return $this->belongsTo(Curso::class,'idCurso');
    }
}
