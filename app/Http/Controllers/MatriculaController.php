<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index() {
        $link = 'matriculas';
        $matriculas = Matricula::all();
        return view('matriculas.index', compact('link', 'matriculas'));
    }
}
