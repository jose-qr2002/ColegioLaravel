<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index() {
        $link = 'instructores';
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
            'nombres' => 'required|regex:/^[a-zA-Z\s]+$/',
            'apellidos' => 'required|regex:/^[a-zA-Z\s]+$/',
            'celular' => 'required|numeric',
            'profesion' => 'required|in:Ingeniería de Sistemas,Desarrollo de Software,Ingeniería en Inteligencia Artificial',
            'grado_instruccion' => 'required|in:Técnico,Licenciado',
            'anios_experiencia' => 'required|integer|min:0',
            'salario' => 'required|numeric',
            'direccion' => 'required'
        ]);
        Instructor::create($request->all());
        return redirect()->route('instructores.index');
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
            'nombres' => 'required|regex:/^[a-zA-Z\s]+$/',
            'apellidos' => 'required|regex:/^[a-zA-Z\s]+$/',
            'celular' => 'required|numeric',
            'profesion' => 'required|in:Ingeniería de Sistemas,Desarrollo de Software,Ingeniería en Inteligencia Artificial',
            'grado_instruccion' => 'required|in:Técnico,Licenciado',
            'anios_experiencia' => 'required|integer|min:0',
            'salario' => 'required|numeric',
            'direccion' => 'required'
        ]);

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
    }

    public function destroy($id) {
        $instructor = Instructor::findOrFail($id);
        $instructor->delete();

        return redirect()->route('instructores.index');
    }

}
