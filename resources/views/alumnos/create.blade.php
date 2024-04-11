@extends('cabecera')

@section('contenido')
    <h2 style="text-align: center;">Crear Alumno</h2>
    <form method="POST" action="{{ route('alumnos.store') }}" style="max-width: 400px; margin: 0 auto;">
        @csrf
        <input type="text" id="dni" name="dni" style="width: 100%; padding: 5px; margin-bottom: 10px;" placeholder="dni">
        <input type="text" id="nombres" name="nombres" style="width: 100%; padding: 5px; margin-bottom: 10px;" placeholder="nombres">
        <input type="text" id="apellidos" name="apellidos" style="width: 100%; padding: 5px;" placeholder="apellidos">

        <button type="submit" style="padding: 10px; margin-top: 10px; font-size: 16px; background: #4770df; cursor: pointer; color: white; border: none;">Guardar</button>
    </form>
@endsection