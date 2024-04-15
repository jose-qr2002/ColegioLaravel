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
        <h2 class="fs-1 mt-3 mb-3" style="text-align: center;">Registrar Instructor</h2>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('instructores.index') }}" class="btn btn-secondary btn-sm mb-2">Volver</a>
                <h5 class="card-title">Llene los campos</h5>
                <form method="POST" action="{{ route('instructores.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Ingrese su nombre">
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="number" id="dni" name="dni" class="form-control" placeholder="Ingrese un N° de DNI">
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" id="celular" name="celular" class="form-control" placeholder="Ingrese el numero de celular">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="salario" class="form-label">Salario</label>
                            <input type="text" id="salario" name="salario" class="form-control" placeholder="Ingrese el salario">
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="anios_experiencia" class="form-label">Años de Experiencia</label>
                            <input type="number" class="form-control" id="anios_experiencia" name="anios_experiencia" placeholder="Ingrese los años de experiencia">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="grado_instruccion" class="form-label">Grado de Instruccion</label>
                            <select class="form-select" name="grado_instruccion" id="grado_instruccion">
                                <option value="" disabled selected>-- Seleccione una opcion --</option>
                                <option value="Técnico">Técnico</option>
                                <option value="Licenciado">Licenciado</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="profesion" class="form-label">Profesión</label>
                            <select class="form-select" name="profesion" id="profesion">
                                <option value="" disabled selected>-- Seleccione una opción --</option>
                                <option value="Ingeniería de Sistemas">Ingeniería de Sistemas</option>
                                <option value="Desarrollo de Software">Desarrollo de Software</option>
                                <option value="Ingeniería en Inteligencia Artificial">Ingeniería en Inteligencia Artificial</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ingrese la dirección">
                    </div>
            
                    <button type="submit" class="btn btn-dark">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection