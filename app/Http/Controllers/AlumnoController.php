<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    public function index(Request $request)
    {
        $link = 'alumnos';
        if($request->parametro && $request->metodoBusqueda) {
            $alumnos = Alumno::where($request->metodoBusqueda, 'like', '%'.$request->parametro.'%')->get();
            return view('alumnos.index', compact('alumnos', 'link'));
        }
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos', 'link'));
    }

    public function create(Request $request)
    {
        $link = 'alumnos';
        return view('alumnos.create', compact('link'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|digits:8|unique:alumnos,dni',
            'nombres' => 'required|regex:/^[\pL\sáéíóúÁÉÍÓÚüÜ]+$/u',
            'apellidos' => 'required|regex:/^[\pL\sáéíóúÁÉÍÓÚüÜ]+$/u',
        ]);

        Alumno::create($request->all());
        return redirect()->route('alumnos.index');
    }

    public function edit($id)
    {
        $link = 'alumnos';
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.edit', compact('alumno', 'link'));
    }

    public function update(Request $request, $id) {
        $alumno = Alumno::findOrFail($id);

        $request->validate([
            'dni' => 'required|digits:8|unique:alumnos,dni,'.$id,
            'nombres' => 'required|regex:/^[\pL\sáéíóúÁÉÍÓÚüÜ]+$/u',
            'apellidos' => 'required|regex:/^[\pL\sáéíóúÁÉÍÓÚüÜ]+$/u',
        ]);

        $alumno->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
        ]);

        return redirect()->route('alumnos.index');
    }

    public function destroy($id) {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return redirect()->route('alumnos.index');
    }

    public function showMatriculas($id) {
        $link = 'alumnos';
        $alumno = Alumno::findOrFail($id);
        $matriculas = $alumno->matriculas;
        return view('alumnos.showMatriculas', compact('link', 'alumno', 'matriculas'));
    }

}
