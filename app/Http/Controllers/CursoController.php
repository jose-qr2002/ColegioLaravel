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

    public function create() {
        $link = 'cursos';
        return view('cursos.create', compact('link'));
    }

    public function store(Request $request) {
        $request->validate([
            'codigo' => 'required|alpha_num|size:5|unique:cursos,codigo',
            'nombre' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'carrera' => 'required|in:Ingeniería de Soporte TI,Ingeniería de Software,Administración de empresas',
            'modalidad' => 'required|in:Presencial,Semipresencial,Virtual',
            'ciclo' => 'required|in:I,II,III,IV,V,VI',
        ]);
        Curso::create($request->all());
        return redirect()->route('cursos.index');
    }
}
