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
    <h1 class="text-uppercase fs-1 text-center mt-3">Lista de Alumnos</h1>
    <a href="{{ route('alumnos.create') }}" class="btn btn-dark opacity-75">Registrar Alumno</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered border-danger caption-top">
            <caption>
                Tabla de Alumnos
            </caption>
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>DNI</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-warning">
            @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->dni }}</td>
                    <td>{{ $alumno->nombres }}</td>
                    <td>{{ $alumno->apellidos }}</td>
                    <td style="">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-warning">
                                <a href="{{ route('alumnos.edit', [$alumno->id]) }}" style="text-decoration: none; font-weight: 700; color: black;">Editar</a>
                            </button>
                            <button type="button" class="btn btn-danger" style="padding: 0;">
                                <form action="{{ route('alumnos.destroy', [$alumno->id]) }}" method="POST" style="display: inline;">
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