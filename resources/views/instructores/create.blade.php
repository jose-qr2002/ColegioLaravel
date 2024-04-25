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
<div class="contenido-sombra">
    <div class="container-form">
        <h1 class="fs-1 mb-3" style="text-align: center;">Registrar Instructor</h1>
        <div class="card shadow">
            <div class="card-body">
                <a href="{{ route('instructores.index') }}" class="btn btn-info btn-sm mb-3 fw-semibold"><i class="ri-arrow-left-line"></i> Volver</a>
                <h5 class="card-subtitle mb-2 text-muted fs-6">Llene los campos</h5>
                <form method="POST" action="{{ route('instructores.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="nombres" class="form-label fw-bold">Nombres</label>
                            <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Ingrese su nombre" value="{{ old('nombres') }}">
                            @error('nombres')
                                <div class="error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="apellidos" class="form-label fw-bold">Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos" value="{{ old('apellidos') }}">
                            @error('apellidos')
                                <div class="error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="dni" class="form-label fw-bold">DNI</label>
                            <input type="number" id="dni" name="dni" class="form-control" placeholder="Ingrese un N° de DNI" value="{{ old('dni') }}">
                            @error('dni')
                                <div class="error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="celular" class="form-label fw-bold">Celular</label>
                            <input type="tel" id="celular" name="celular" class="form-control" placeholder="Ingrese el numero de celular" value="{{ old('celular') }}">
                            @error('celular')
                                <div class="error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="salario" class="form-label fw-bold">Salario</label>
                            <input type="number" id="salario" name="salario" class="form-control" placeholder="Ingrese el salario" value="{{ old('salario') }}">
                            @error('salario')
                                <div class="error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="anios_experiencia" class="form-label fw-bold">Años de Experiencia</label>
                            <input type="number" class="form-control" id="anios_experiencia" name="anios_experiencia" placeholder="Ingrese los años de experiencia" value="{{ old('anios_experiencia') }}">
                            @error('anios_experiencia')
                                <div class="error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="grado_instruccion" class="form-label fw-bold">Grado de Instruccion</label>
                            <select class="form-select" name="grado_instruccion" id="grado_instruccion">
                                <option value="" disabled selected>-- Seleccione una opcion --</option>
                                <option value="Técnico" {{ old('grado_instruccion') == 'Técnico' ? 'selected':'' }}>Técnico</option>
                                <option value="Licenciado" {{ old('grado_instruccion') == 'Licenciado' ? 'selected':'' }}>Licenciado</option>
                            </select>
                            @error('grado_instruccion')
                                <div class="error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="profesion" class="form-label fw-bold">Profesión</label>
                            <select class="form-select" name="profesion" id="profesion">
                                <option value="" disabled selected>-- Seleccione una opción --</option>
                                <option value="Ingeniería de Sistemas" {{ old('profesion') == 'Ingeniería de Sistemas' ? 'selected':'' }}>Ingeniería de Sistemas</option>
                                <option value="Desarrollo de Software" {{ old('profesion') == 'Desarrollo de Software' ? 'selected':'' }}>Desarrollo de Software</option>
                                <option value="Ingeniería en Inteligencia Artificial" {{ old('profesion') == 'Ingeniería en Inteligencia Artificial' ? 'selected':'' }}>Ingeniería en Inteligencia Artificial</option>
                            </select>
                            @error('profesion')
                                <div class="error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label fw-bold">Dirección</label>
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ingrese la dirección" value="{{ old('direccion') }}">
                        @error('direccion')
                                <div class="error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
            
                    <button type="submit" class="btn btn-dark fw-semibold">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection