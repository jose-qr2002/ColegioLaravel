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
    <h1 class="text-uppercase fs-1 text-center mt-3" style="">Lista de Instructores</h1>
    <a href="{{ route('instructores.create') }}" class="btn btn-dark opacity-75">Registrar Instructor</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered border-danger caption-top" style="">
            <caption>
                Tabla de Instructores
            </caption>
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>DNI</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Profesión</th>
                    <th>Celular</th>
                    <th>Salario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-warning">
            @forelse($instructores as $instructor)
                <tr>
                    <td>{{ $instructor->id }}</td>
                    <td>{{ $instructor->dni }}</td>
                    <td>{{ $instructor->nombres }}</td>
                    <td>{{ $instructor->apellidos }}</td>
                    <td>{{ $instructor->profesion }}</td>
                    <td>{{ $instructor->celular }}</td>
                    <td>{{ $instructor->salario }}</td>
                    <td style="">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a class="btn btn-warning" href="{{ route('instructores.edit', [$instructor->id]) }}" style="text-decoration: none; font-weight: 700; color: black;">Editar</a>
                            <button type="button" class="btn btn-danger" style="padding: 0;">
                                <form action="{{ route('instructores.destroy', [$instructor->id]) }}" method="POST" style="display: inline;">
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
                    <td colspan="7" class="text-center">No hay instrucores registrados</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection