<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');
Route::get('alumnos/{idAlumno}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
Route::put('alumnos/{idAlumno}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::delete('alumnos/{idAlumno}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');