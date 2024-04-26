@extends('cabecera')
@section('estilos')
    <style>
        .container-form {
            max-width: 720px;
            margin: 0 auto;
            padding: 10px;
        }

        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0;
        }

        li > p{
            margin-bottom: 0
        }
    </style>    
@endsection

@section('contenido')
<div class="contenido-sombra">
    <div class="container-form">
        <h1 class="fs-1 mb-3" style="text-align: center;">Registrar Matricula</h1>
        <div class="card bg-info-subtle">
            <div class="card-body">
                @if (session('mensaje'))
                    <div class="alert alert-{{session('tipo')}} alert-dismissible fade show" role="alert">
                        <strong>Mensaje: </strong> {{ session('mensaje') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="{{ route('matriculas.index') }}" class="btn btn-info btn-sm mb-3 fw-semibold"><i class="ri-arrow-left-line"></i> Volver</a>
                <h5 class="card-subtitle mb-2 text-muted fs-6">Ingrese los campos</h5>
                <form method="GET" action="{{ route('matriculas.create') }}">
                    <div class="mb-3">
                        <label for="dni" class="form-label fw-bold">Busque un Alumno</label>
                        <div class="input-group mb-3">
                            <input name="alumnoDni" type="text" class="form-control" placeholder="Buscar por DNI" value="{{ request()->input('alumnoDni') ?? ''}}">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                        @if (isset($alumnoSeleccionado))
                            <div>
                                <label class="fw-semibold text-primary">Alumno Seleccionado: </label>
                                <span>{{ $alumnoSeleccionado->nombres ?? '' }} {{ $alumnoSeleccionado->apellidos ?? '' }}</span>
                            </div>
                            <label class="fw-bold text-primary">Cursos Matriculados del Alumno:</label>
                            @forelse ($alumnoSeleccionado->matriculas as $matricula)
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-primary d-flex justify-content-between">
                                        <p>{{ $matricula->curso->nombre }}</p>
                                        <p>{{ $matricula->anioAcad }}</p>
                                    </li>
                                </ul>
                            @empty
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-warning">
                                    No registra Matriculas
                                </li>
                            </ul>
                            @endforelse
                        @endif
                        @error('alumnoDni')
                            <div class="error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label fw-bold">Busque un Curso</label>
                        <div class="input-group mb-3">
                            <input name="cursoCodigo" type="text" class="form-control" placeholder="Buscar por Codigo" value="{{ request()->input('cursoCodigo') ?? ''}}">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                        @if (isset($cursoSeleccionado))
                            <div>
                                <label>Curso Seleccionado: </label>
                                <span>{{ $cursoSeleccionado->nombre ?? '' }}</span>
                            </div>
                            <label class="fw-bold text-primary">Alumnos Matriculados en el Curso:</label>
                            @forelse ($cursoSeleccionado->matriculas as $matricula)
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-primary d-flex justify-content-between">
                                        <p>{{ $matricula->alumno->nombres }}</p>
                                        <p>{{ $matricula->anioAcad }}</p>
                                    </li>
                                </ul>
                            @empty
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-warning">
                                    No registra Matriculas
                                </li>
                            </ul>
                            @endforelse
                        @endif
                        @error('cursoCodigo')
                            <div class="error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </form>

                <form action="{{ route('matriculas.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="idAlumno" value="{{ session('idAlumno') ?? '' }}">
                    <input type="hidden" name="idCurso" value="{{ session('idCurso') ?? '' }}">
                    <div class="mb-3">
                        <label for="dni" class="form-label fw-bold">Selecciones un año academico</label>
                        <select name="anioAcad" class="form-select">
                            <option value="" disabled selected>--Seleccione una opcion--</option>
                            <option value="2023-I">2023-I</option>
                            <option value="2023-II">2023-II</option>
                            <option value="2024-I">2024-I</option>
                            <option value="2024-II">2024-II</option>
                        </select>
                    </div>
                    @error('anioAcad')
                        <div class="error" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('idAlumno')
                        <div class="error" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('idCurso')
                        <div class="error" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-dark fw-semibold mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection