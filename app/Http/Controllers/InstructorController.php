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
}
