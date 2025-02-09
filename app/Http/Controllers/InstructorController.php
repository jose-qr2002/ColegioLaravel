<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Exception;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index(Request $request) {
        $link = 'instructores';
        if($request->parametro && $request->metodoBusqueda) {
            $instructores = Instructor::where($request->metodoBusqueda, 'like', '%'.$request->parametro.'%')->get();
            return view('instructores.index', compact('instructores', 'link'));
        }
        $instructores = Instructor::all();
        return view('instructores.index', compact('instructores', 'link'));
    }

    public function create() {
        $link = 'instructores';
        return view('instructores.create', compact('link'));
    }

    public function store(Request $request) {
        $request->validate([
            'dni' => 'required|numeric|digits:8|unique:instructores,dni',
            'nombres' => 'required|regex:/^[\pL\sáéíóúÁÉÍÓÚüÜ]+$/u',
            'apellidos' => 'required|regex:/^[\pL\sáéíóúÁÉÍÓÚüÜ]+$/u',
            'celular' => 'required|numeric',
            'profesion' => 'required|in:Ingeniería de Sistemas,Desarrollo de Software,Ingeniería en Inteligencia Artificial',
            'grado_instruccion' => 'required|in:Técnico,Licenciado',
            'anios_experiencia' => 'required|integer|min:0',
            'salario' => 'required|numeric',
            'direccion' => 'required'
        ]);

        try {
            Instructor::create($request->all());
            return redirect()->route('instructores.index');
        } catch (Exception $e) {
            return back()->with([
                'mensaje' => 'No se logro registrar al instructor',
                'tipo' => 'danger'
            ]);
        }
    }

    public function edit($id) {
        $link = 'instructores';
        $instructor = Instructor::findOrFail($id);
        return view('instructores.edit', compact('instructor', 'link'));
    }

    public function update(Request $request, $id) {
        $instructor = Instructor::findOrFail($id);

        $request->validate([
            'dni' => 'required|numeric|digits:8|unique:instructores,dni,'.$id,
            'nombres' => 'required|regex:/^[\pL\sáéíóúÁÉÍÓÚüÜ]+$/u',
            'apellidos' => 'required|regex:/^[\pL\sáéíóúÁÉÍÓÚüÜ]+$/u',
            'celular' => 'required|numeric',
            'profesion' => 'required|in:Ingeniería de Sistemas,Desarrollo de Software,Ingeniería en Inteligencia Artificial',
            'grado_instruccion' => 'required|in:Técnico,Licenciado',
            'anios_experiencia' => 'required|integer|min:0',
            'salario' => 'required|numeric',
            'direccion' => 'required'
        ]);
        try {
            $instructor->update([
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'dni' => $request->dni,
                'celular' => $request->celular,
                'direccion' => $request->direccion,
                'titulo' => $request->titulo,
                'salario' => $request->salario
            ]);
            return redirect()->route('instructores.index');
        } catch (Exception $e) {
            return back()->with([
                'mensaje' => 'No se logro actualizar al instructor',
                'tipo' => 'danger'
            ]);
        }
        
    }

    public function destroy($id) {
        try {
            $instructor = Instructor::findOrFail($id);
            $instructor->delete();
            return redirect()->route('instructores.index');
        } catch (Exception $e) {
            return back()->with([
                'mensaje' => 'No se logro eliminar al instructor',
                'tipo' => 'danger'
            ]);
        }
    }

}
