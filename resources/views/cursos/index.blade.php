@extends('cabecera')

@section('estilos')
    <style>
        input[type="submit"] {
            background: transparent;
            border: 0;
            color: white;
            font-weight: 700;
        }

        tbody td {
            align-content: center;
        }
    </style>
@endsection

@section('contenido')
    <div class="container">
        <h1 class="text-uppercase fs-1 text-center mt-3">Lista de Cursos</h1>
        <a href="{{ route('cursos.create') }}" class="btn btn-dark opacity-75">Agregar Curso</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered border-danger caption-top">
                <caption>
                    Tabla de Cursos
                </caption>
                <thead>
                    <tr class="table-dark">
                        <th>ID</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Modalidad</th>
                        <th>Carrera</th>
                        <th>Ciclo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-warning">
                @foreach($cursos as $curso)
                    <tr>
                        <td>{{ $curso->id }}</td>
                        <td>{{ $curso->codigo }}</td>
                        <td>{{ $curso->nombre }}</td>
                        <td>{{ $curso->modalidad }}</td>
                        <td>{{ $curso->carrera }}</td>
                        <td>{{ $curso->ciclo }}</td>
                        <td style="">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a class="btn btn-warning" href="{{-- route('instructores.edit', [$instructor->id]) --}}" style="text-decoration: none; font-weight: 700; color: black;">Editar</a>
                                <button type="button" class="btn btn-danger" style="padding: 0;">
                                    <form action="{{-- route('alumnos.destroy', [$alumno->id]) --}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar">
                                    </form>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection