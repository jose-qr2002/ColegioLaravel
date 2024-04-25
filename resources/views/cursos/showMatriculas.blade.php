@extends('cabecera')

@section('estilos')
    <style>
        .card__grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1rem;
        }

        @media (min-width: 550px) {
            .card__grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 990px) {
            .card__grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .card__grid-matriculas {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1rem;
        }

        @media (min-width: 550px) {
            .card__grid-matriculas {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .card__dato {
            background: #98C1D9;
            padding-left: 13px;
            border-inline-start: 4px solid #3D5A80;
            border-radius: 4px;
            padding-block: 2px;
        }

        .card__dato-matriculas {
            background: #b8eef0b2;
        }

        .card__dato label {
            font-weight: 700;
            display: block;
        }

        .matriculas-id {
            font-weight: 700;
        }

        .matriculas-id span {
            font-weight: 400;
        }
    </style>
@endsection

@section('contenido')
<div class="contenido-sombra">
    <h1 class="text-center fs-1">Matriculas Registradas</h1>
    <div class="container">
        <div class="card bg-secondary-subtle shadow" style="max-width: 100%;">
            <div class="card-body">
                <h5 class="card-title">Datos del Curso</h5>
                <div class="card__grid">
                    <div class="card__dato">
                        <label for="">Codigo:</label>
                        <span>{{ $curso->codigo }}</span>
                    </div>
                    <div class="card__dato">
                        <label for="">Nombre:</label>
                        <span>{{ $curso->nombre }}</span>
                    </div>
                    <div class="card__dato">
                        <label for="">Carrera:</label>
                        <span>{{ $curso->carrera }}</span>
                    </div>
                    <div class="card__dato">
                        <label for="">Ciclo:</label>
                        <span>{{ $curso->ciclo }}</span>
                    </div>
                </div>
            </div>  
        </div>
        <div class="card bg-secondary-subtle mt-2 mb-2" style="max-width: 100%;">
            <div class="card-body">
                <h5 class="card-title">Matriculas del Curso</h5>
                @forelse ($matriculas as $matricula)
                    <span class="matriculas-id">ID: <span>{{ $matricula->id }}</span></span>
                    <div class="card__grid-matriculas">
                        <div class="card__dato card__dato-matriculas">
                            <label for="">Alumno:</label>
                            <span>{{$matricula->alumno->nombres}}</span>
                        </div>
                        <div class="card__dato card__dato-matriculas">
                            <label for="">Año Academico:</label>
                            <span>{{$matricula->anioAcad}}</span>
                        </div>
                    </div>
                    @if (!$loop->last)
                        <hr>
                    @endif
                @empty
                    <p>El alumno no registro matriculas</p>
                @endforelse
            </div>  
        </div>
    </div>
</div>
@endsection