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
        <h1 class="fs-1 mt-3 mb-3" style="text-align: center;">Editar Alumno</h1>
        <div class="card bg-info-subtle">
            <div class="card-body">
                @if (session('mensaje'))
                    <div class="alert alert-{{session('tipo')}} alert-dismissible fade show" role="alert">
                        <strong>Mensaje: </strong> {{ session('mensaje') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="{{ route('alumnos.index') }}" class="btn btn-info btn-sm mb-3 fw-semibold"><i class="ri-arrow-left-line"></i> Volver</a>
                <h5 class="card-subtitle mb-2 text-muted fs-6">Llene los campos</h5>
                <form method="POST" action="{{ route('alumnos.update', [$alumno->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="dni" class="form-label fw-bold">DNI</label>
                        <input type="number" id="dni" name="dni" class="form-control" placeholder="Ingrese un N° de DNI" value="{{$alumno->dni}}">
                        @error('dni')
                            <div class="error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nombres" class="form-label fw-bold">Nombres</label>
                        <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Ingrese su nombre" value="{{$alumno->nombres}}">
                        @error('nombres')
                            <div class="error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label fw-bold">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos" value="{{$alumno->apellidos}}">
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