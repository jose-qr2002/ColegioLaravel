@extends('cabecera')

@section('estilos')
    <style>
        table {
            width: 100%;
            border: 1px solid #000;
            border-spacing: 0;
        }
        th, td {
            width: 20%;
            text-align: left;
            border: 1px solid #000;
            padding: 0.3em;
        }

        th {
            background: #afadad;
            font-weight: 700;
        }

        caption {
            padding: 0.3em;
            color: #fff;
            background: #000;
        }
    </style>
@endsection

@section('contenido')
    <h1>Lista de Alumnos</h1>
    <table>
        <caption>
            Tabla de Alumnos
        </caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>
                <td>{{ $alumno->dni }}</td>
                <td>{{ $alumno->nombres }}</td>
                <td>{{ $alumno->apellidos }}</td>
                <td style="">
                    <a href="{{ route('alumnos.edit', [$alumno->id]) }}" style="text-decoration: none; font-weight: 700; color: #807b4e;">Editar</a>
                    <form action="{{ route('alumnos.destroy', [$alumno->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="text-decoration: none; font-weight: 700; color: #f04242;padding: 0; background: none; border:none;cursor: pointer;">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection