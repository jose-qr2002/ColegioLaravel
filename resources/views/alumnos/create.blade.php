@extends('cabecera')
@section('estilos')
    <style>
        .container-form {
            max-width: 430px;
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
<div class="contenido-sombra">
    <div class="container-form">
        <h1 class="fs-1 mt-3 mb-3" style="text-align: center;">Registrar Alumno</h1>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('alumnos.index') }}" class="btn btn-secondary btn-sm mb-2"><i class="ri-arrow-left-line"></i> Volver</a>
                <h5 class="card-title">Llene los campos</h5>
                <form method="POST" action="{{ route('alumnos.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="number" id="dni" name="dni" class="form-control" placeholder="Ingrese un N° de DNI">
                        @error('dni')
                            <div class="error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Ingrese su nombre">
                        @error('nombres')
                            <div class="error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos">
                        @error('apellidos')
                            <div class="error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            
                    <button type="submit" class="btn btn-dark">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection