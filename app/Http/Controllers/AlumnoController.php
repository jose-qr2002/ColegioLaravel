<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    public function index()
    {
        $link = 'alumnos';
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

}
