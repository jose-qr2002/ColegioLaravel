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
        <h1 class="fs-1 mb-3" style="text-align: center;">Registrar Curso</h1>
        <div class="card shadow">
            <div class="card-body">
                <a href="{{ route('cursos.index') }}" class="btn btn-secondary btn-sm mb-2"><i class="ri-arrow-left-line"></i> Volver</a>
                <h5 class="card-title">Llene los campos</h5>
                <form method="POST" action="{{ route('cursos.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre del curso" value="{{ old('nombre') }}">
                        @error('nombre')
                            <div class="error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="codigo" class="form-label">Codigo</label>
                        <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Ingrese un código" value="{{ old('codigo') }}">
                        @error('codigo')
                            <div class="error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="carrera" class="form-label">Carrera</label>
                        <select class="form-select" name="carrera" id="carrera">
                            <option value="" disabled selected>-- Seleccione una opcion --</option>
                            <option value="Ingeniería de Soporte TI" {{ old('carrera') == 'Ingeniería de Soporte TI' ? 'selected':'' }}>Ingeniería de Soporte TI</option>
                            <option value="Ingeniería de Software" {{ old('carrera') == 'Ingeniería de Software' ? 'selected':'' }}>Ingeniería de Software</option>
                            <option value="Administración de empresas" {{ old('carrera') == 'Administración de empresas' ? 'selected':'' }}>Administración de empresas</option>
                        </select>
                        @error('carrera')
                            <div class="error" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="modalidad" class="form-label">Modalidad</label>
                            <select class="form-select" name="modalidad" id="modalidad">
                                <option value="" disabled selected>-- Seleccione una opcion --</option>
                                <option value="Presencial" {{ old('modalidad') == 'Presencial' ? 'selected':'' }}>Presencial</option>
                                <option value="Semipresencial" {{ old('modalidad') == 'Semipresencial' ? 'selected':'' }}>Semipresencial</option>
                                <option value="Virtual" {{ old('modalidad') == 'Virtual' ? 'selected':'' }}>Virtual</option>
                            </select>
                            @error('modalidad')
                                <div class="error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="ciclo" class="form-label">Ciclo</label>
                            <select class="form-select" name="ciclo" id="ciclo">
                                <option value="" disabled selected>-- Seleccione una opcion --</option>
                                <option value="I" {{ old('ciclo') == 'I' ? 'selected':'' }}>I</option>
                                <option value="II" {{ old('ciclo') == 'II' ? 'selected':'' }}>II</option>
                                <option value="III" {{ old('ciclo') == 'III' ? 'selected':'' }}>III</option>
                                <option value="IV" {{ old('ciclo') == 'IV' ? 'selected':'' }}>IV</option>
                                <option value="V" {{ old('ciclo') == 'V' ? 'selected':'' }}>V</option>
                                <option value="VI" {{ old('ciclo') == 'VI' ? 'selected':'' }}>VI</option>
                            </select>
                            @error('ciclo')
                                <div class="error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
            
                    <button type="submit" class="btn btn-dark">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection