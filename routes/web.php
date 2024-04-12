<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\InstructorController;

// Crud Alumnos
Route::get('/', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');
Route::get('alumnos/{idAlumno}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
Route::put('alumnos/{idAlumno}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::delete('alumnos/{idAlumno}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');

// Crud Instructores
Route::get('/instructores', [InstructorController::class, 'index'])->name('instructores.index');
Route::get('/instructores/create', [InstructorController::class, 'create'])->name('instructores.create');