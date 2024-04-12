@extends('cabecera')
@section('estilos')
    <style>
        .container-form {
            max-width: 768px;
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
    <h2 class="fs-1 mt-3 mb-3" style="text-align: center;">Editar Instructor</h2>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('instructores.index') }}" class="btn btn-secondary btn-sm mb-2">Volver</a>
            <h5 class="card-title">Llene los campos</h5>
            <form method="POST" action="">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-6 mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="number" id="dni" name="dni" class="form-control" placeholder="Ingrese un N° de DNI" value="{{ $instructor->dni }}">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Ingrese el Titulo del Instructor" value="{{ $instructor->titulo }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 mb-3">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Ingrese su nombre" value="{{ $instructor->nombres }}">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos" value="{{ $instructor->apellidos }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 mb-3">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" id="celular" name="celular" class="form-control" placeholder="Ingrese el numero de celular" value="{{ $instructor->celular }}">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <label for="salario" class="form-label">Salario</label>
                        <input type="text" id="salario" name="salario" class="form-control" placeholder="Ingrese el salario" value="{{ $instructor->salario }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ingrese la dirección" value="{{ $instructor->direccion }}">
                </div>
        
                <button type="submit" class="btn btn-dark">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection