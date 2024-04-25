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
<div class="contenido-sombra">
    <div class="container">
        <h1 class="text-uppercase fs-1 text-center">Lista de Matriculas</h1>
        <div class="d-sm-flex justify-content-sm-between">
            <a href="{{ route('matriculas.create') }}" class="mb-2 btn btn-info fw-semibold">Registrar Matricula</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered border-danger caption-top" style="">
                <caption>
                    Tabla de Matriculas
                </caption>
                <thead>
                    <tr class="table-dark">
                        <th>ID</th>
                        <th>Alumno</th>
                        <th>Curso</th>
                        <th>Año Academico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-secondary"
                @forelse($matriculas as $matricula)
                    <tr>
                        <td>{{ $matricula->id }}</td>
                        <td>{{ $matricula->alumno->nombres . " " . $matricula->alumno->apellidos}}</td>
                        <td>{{ $matricula->curso->nombre }}</td>
                        <td>{{ $matricula->anioAcad }}</td>
                        <td style="">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a class="btn btn-warning" href="{{-- route('instructores.edit', [$instructor->id]) --}}" style="text-decoration: none; font-weight: 700; color: black;">Editar</a>
                                <button type="button" class="btn btn-danger" style="padding: 0;">
                                    <form action="{{-- route('instructores.destroy', [$instructor->id]) --}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar">
                                    </form>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No se encontraron matriculas</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection