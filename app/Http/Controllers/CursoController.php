<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Exception;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(Request $request) {
        $link = 'cursos';
        if($request->parametro && $request->metodoBusqueda) {
            $cursos = Curso::where($request->metodoBusqueda, 'like', '%'.$request->parametro.'%')->get();
            return view('cursos.index', compact('cursos', 'link'));
        }
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
            'nombre' => 'required|regex:/^[\pL\s\dáéíóúÁÉÍÓÚüÜ]+$/u',
            'carrera' => 'required|in:Ingeniería de Soporte TI,Ingeniería de Software,Administración de empresas',
            'modalidad' => 'required|in:Presencial,Semipresencial,Virtual',
            'ciclo' => 'required|in:I,II,III,IV,V,VI',
        ]);
        try {
            Curso::create($request->all());
            return redirect()->route('cursos.index');
        } catch (Exception $e) {
            return back()->with([
                'mensaje' => 'No se logro registrar al curso',
                'tipo' => 'danger'
            ]);
        }
    }

    public function edit($id) {
        $link = 'cursos';
        $curso = Curso::findOrFail($id);
        return view('cursos.edit', compact('link', 'curso'));
    }

    public function update(Request $request, $id) {
        $curso = Curso::findOrFail($id);

        $request->validate([
            'codigo' => 'required|alpha_num|size:5|unique:cursos,codigo,'.$id,
            'nombre' => 'required|regex:/^[\pL\s\dáéíóúÁÉÍÓÚüÜ]+$/u',
            'carrera' => 'required|in:Ingeniería de Soporte TI,Ingeniería de Software,Administración de empresas',
            'modalidad' => 'required|in:Presencial,Semipresencial,Virtual',
            'ciclo' => 'required|in:I,II,III,IV,V,VI',
        ]);

        try {
            $curso->update($request->all());
            return redirect()->route('cursos.index');
        } catch (Exception $e) {
            return back()->with([
                'mensaje' => 'No se logro actualizar el curso',
                'tipo' => 'danger'
            ]);
        }
    }

    public function destroy($id) {
        try {
            $curso = Curso::findOrFail($id);
            $curso->delete();
            return redirect()->route('cursos.index');
        } catch (Exception $e) {
            return back()->with([
                'mensaje' => 'No se logro eliminar el curso',
                'tipo' => 'danger'
            ]);
        }
        
    }

    public function showMatriculas($id) {
        $link = 'cursos';
        $curso = Curso::findOrFail($id);
        $matriculas = $curso->matriculas;
        return view('cursos.showMatriculas', compact('link', 'curso', 'matriculas'));
    }
}
