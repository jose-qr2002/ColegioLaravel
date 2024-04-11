@extends('cabecera')

@section('estilos')
    <style>
        
    </style>
@endsection

@section('contenido')
<div class="container">
    <h1 class="text-uppercase fs-1 text-center mt-3">Lista de Alumnos</h1>
    <a href="{{ route('alumnos.create') }}" class="btn btn-primary">Registrar Alumno</a>
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
    </div>
</div>
@endsection