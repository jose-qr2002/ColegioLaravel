<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index() {
        $instructores = Instructor::all();
        return view('instructores.index', compact('instructores'));
    }

    public function create() {
        return view('instructores.create');
    }

    public function store(Request $request) {
        Instructor::create($request->all());
        return redirect()->route('instructores.index');
    }

    public function edit($id) {
        $instructor = Instructor::findOrFail($id);
        return view('instructores.edit', compact('instructor'));
    }

    public function update(Request $request, $id) {
        $instructor = Instructor::findOrFail($id);

        $instructor->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'celular' => $request->celular,
            'direccion' => $request->direccion,
            'titulo' => $request->titulo,
            'salario' => $request->salario
        ]);

        return redirect()->route('instructor.index');
    }

}
