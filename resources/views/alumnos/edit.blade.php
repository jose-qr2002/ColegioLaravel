@extends('cabecera')

@section('contenido')
    <h2 style="text-align: center;">Editar Alumno</h2>
    <div style="max-width: 400px; margin: 0 auto;">
        <form method="POST" action="{{ route('alumnos.update', [$alumno->id]) }}" style="display: flex; flex-direction: column;">
            @csrf
            @method('PUT')
            <input type="text" id="dni" name="dni" style="display: block; width: 100%; padding: 5px; margin-bottom: 10px;" placeholder="dni" value="{{ $alumno->dni }}">
            <input type="text" id="nombres" name="nombres" style="display: block; width: 100%; padding: 5px; margin-bottom: 10px;" placeholder="nombres" value="{{ $alumno->nombres }}">
            <input type="text" id="apellidos" name="apellidos" style="display: block; width: 100%; padding: 5px;" placeholder="apellidos" value="{{ $alumno->apellidos }}">

            <button type="submit" style="padding: 10px; margin-top: 10px; font-size: 16px; background: #4770df; cursor: pointer; color: white; border: none;">Actualizar</button>
        </form>
    </div>
@endsection