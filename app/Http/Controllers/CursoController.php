<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index() {
        $link = 'cursos';
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos', 'link'));
    }
}
