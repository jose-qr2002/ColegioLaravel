<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Matricula;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MatriculaController extends Controller
{
    public function index() {
        $link = 'matriculas';
        $matriculas = Matricula::all();
        return view('matriculas.index', compact('link', 'matriculas'));
    }

    public function create(Request $request) {
        $alumnoSeleccionado = null; // Se establece un valor por defecto para pasarlo a la vista
        $cursoSeleccionado = null; // Se establece un valor por defecto para pasarlo a la vista
        // Alumnos
        $request->validate([
            'alumnoDni' => 'nullable|exists:alumnos,dni',
            'cursoCodigo' => 'nullable|exists:cursos,codigo'
        ]);

        if($request->alumnoDni) { // En caso que tenga un request 
            $alumnoSeleccionado = Alumno::where('dni', $request->alumnoDni)->first();
            session(['idAlumno' => $alumnoSeleccionado->id]);
        } else if (session()->has('idAlumno')) {
            $alumnoSeleccionado = Alumno::where('dni', session('idAlumno'))->first();
            
        }
        // Cursos
        if($request->cursoCodigo) {
            $cursoSeleccionado = Curso::where('codigo', $request->cursoCodigo)->first();
            session(['idCurso' => $cursoSeleccionado->id]);
        } else if (session()->has('idCurso')) {
            $cursoSeleccionado = Curso::where('codigo', session('idCurso'))->first();
        }

        $link = 'matriculas';
        return view('matriculas.create', compact('link', 'alumnoSeleccionado', 'cursoSeleccionado'));
    }

    public function store(Request $request) {
        $request->validate([
            'idAlumno' => 'required|exists:alumnos,id',
            'idCurso' => 'required|exists:cursos,id',
            'anioAcad' => 'required|in:2023-I,2023-II,2024-I,2024-II'
        ]);
        try {
            Matricula::create($request->all());
            Session::forget('idAlumno');
            Session::forget('idCurso');
            return redirect()->route('matriculas.index');
        } catch (Exception $e) {
            return back()->with([
                'mensaje' => 'No se logro registrar la matricula',
                'tipo' => 'danger'
            ]);
        }
        
    }

    public function destroy($id) {
        try {
            $matricula = Matricula::findOrFail($id);
            $matricula->delete();
            return redirect()->route('matriculas.index');
        } catch (Exception $e) {
            return back()->with([
                'mensaje' => 'No se logro eliminar la matricula',
                'tipo' => 'danger'
            ]);
        }
    }
}
