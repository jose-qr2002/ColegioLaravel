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
}
