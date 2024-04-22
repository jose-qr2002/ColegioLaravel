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

    </style>    
@endsection

@section('contenido')
    <div class="container-form">
        <h2 class="fs-1 mt-3 mb-3" style="text-align: center;">Registrar Matricula</h2>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('matriculas.index') }}" class="btn btn-secondary btn-sm mb-2"><i class="ri-arrow-left-line"></i> Volver</a>
                <h5 class="card-title">Ingrese los campos</h5>
                <form method="GET" action="{{ route('matriculas.create') }}">
                    <div class="mb-3">
                        <label for="dni" class="form-label">Busque un Alumno</label>
                        <div class="input-group mb-3">
                            <input name="alumnoDni" type="text" class="form-control" placeholder="Buscar por DNI" value="{{ request()->input('alumnoDni') ?? ''}}">
                            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        </div>
                        @if (isset($alumnoSeleccionado))
                            <div>
                                <label>Alumno Seleccionado: </label>
                                <span>{{ $alumnoSeleccionado->nombres ?? '' }}</span>
                            </div>
                        @endif
                        @error('alumnoDni')
                            <div class="error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label">Busque un Curso</label>
                        <div class="input-group mb-3">
                            <input name="cursoCodigo" type="text" class="form-control" placeholder="Buscar por Codigo" value="{{ request()->input('cursoCodigo') ?? ''}}">
                            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        </div>
                        @if (isset($cursoSeleccionado))
                            <div>
                                <label>Curso Seleccionado: </label>
                                <span>{{ $cursoSeleccionado->nombre ?? '' }}</span>
                            </div>
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
                        <label for="dni" class="form-label">Selecciones un año academico</label>
                        <select name="anioAcad" class="form-select">
                            <option value="" disabled selected>--Seleccione una opcion--</option>
                            <option value="2023-I">2023-I</option>
                            <option value="2023-II">2023-II</option>
                            <option value="2024-I">2024-I</option>
                            <option value="2024-II">2024-II</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection