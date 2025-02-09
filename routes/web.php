<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\MatriculaController;
use App\Models\Instructor;

// Crud Alumnos
Route::redirect('/', '/alumnos');
Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');
Route::get('alumnos/{idAlumno}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
Route::put('alumnos/{idAlumno}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::delete('alumnos/{idAlumno}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');
Route::get('/alumnos/matriculas/{id}', [AlumnoController::class, 'showMatriculas'])->name('alumnos.matriculas');

// Crud Instructores
Route::get('/instructores', [InstructorController::class, 'index'])->name('instructores.index');
Route::get('/instructores/create', [InstructorController::class, 'create'])->name('instructores.create');
Route::post('/instructores/store', [InstructorController::class, 'store'])->name('instructores.store');
Route::get('/instructores/{idInstructor}/edit', [InstructorController::class, 'edit'])->name('instructores.edit');
Route::put('/instructores/{idInstructor}/update', [InstructorController::class, 'update'])->name('instructores.update');
Route::delete('/instructores/{idInstructor}/delete', [InstructorController::class, 'destroy'])->name('instructores.destroy');

// Crud Cursos
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
Route::post('/cursos/store', [CursoController::class, 'store'])->name('cursos.store');
Route::get('/cursos/{idCurso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
Route::put('/cursos/{idCurso}/update', [CursoController::class, 'update'])->name('cursos.update');
Route::delete('/cursos/{idCurso}/delete', [CursoController::class, 'destroy'])->name('cursos.destroy');
Route::get('/cursos/matriculas/{id}', [CursoController::class, 'showMatriculas'])->name('cursos.matriculas');

// CRUD MATRICULAS
Route::get('/matriculas', [MatriculaController::class, 'index'])->name('matriculas.index');
Route::get('/matriculas/create', [MatriculaController::class, 'create'])->name('matriculas.create');
Route::post('/matriculas/store', [MatriculaController::class, 'store'])->name('matriculas.store');
Route::delete('/matriculas/{id}/delete', [MatriculaController::class, 'destroy'])->name('matriculas.destroy');