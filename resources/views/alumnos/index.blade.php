@extends('cabecera')

@section('estilos')
    <style>
        input[type="submit"] {
            background: transparent;
            border: 0;
            color: white;
            font-weight: 700;
        }

        tbody td {
            align-content: center;
        }
    </style>
@endsection

@section('contenido')
<div class="contenido-sombra">
    <div class="container">
        <h1 class="text-uppercase fs-1 text-center">Lista de Alumnos</h1>
        @if (session('mensaje'))
            <div class="alert alert-{{session('tipo')}} alert-dismissible fade show" role="alert">
                <strong>Mensaje: </strong> {{ session('mensaje') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-sm-flex justify-content-sm-between">
            <a href="{{ route('alumnos.create') }}" class="mb-2 btn btn-info fw-semibold">Registrar Alumno</a>
            <form action="{{ route('alumnos.index') }}" method="GET" class="input-group" style="max-width: 300px">
                <input value="{{ request()->input('parametro') ?? '' }}" id="parametro" name="parametro" type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                <button type="submit" class="btn btn-info opacity-75 fw-semibold">Buscar</button>
                <button type="button" class="btn btn-info opacity-75 dropdown-toggle dropdown-toggle-split fw-semibold" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <input type="hidden" value="{{ request()->input('metodoBusqueda') ?? '' }}" id="metodoBusqueda" name="metodoBusqueda">
                <ul id="menuBusqueda" class="dropdown-menu dropdown-menu-end">
                    <li><span data-tipoBusqueda="dni" class="dropdown-item {{ request()->input('metodoBusqueda') == 'dni' ? 'active':'' }}">Dni</span></li>
                    <li><span data-tipoBusqueda="nombres" class="dropdown-item {{ request()->input('metodoBusqueda') == 'nombres' ? 'active':'' }}">Nombres</span></li>
                    <li><span data-tipoBusqueda="apellidos" class="dropdown-item {{ request()->input('metodoBusqueda') == 'apellidos' ? 'active':'' }}">Apellidos</span></li>
                </ul>
            </form>
        </div>
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
                <tbody class="table-primary">
                @forelse($alumnos as $alumno)
                    <tr>
                        <td class="fw-bold">{{ $alumno->id }}</td>
                        <td class="text-primary fw-bold">{{ $alumno->dni }}</td>
                        <td>{{ $alumno->nombres }}</td>
                        <td>{{ $alumno->apellidos }}</td>
                        <td style="">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('alumnos.matriculas', $alumno->id) }}" class="btn btn-primary">Matriculas</a>
                                <a class="btn btn-warning" href="{{ route('alumnos.edit', [$alumno->id]) }}" style="text-decoration: none; font-weight: 700; color: black;">Editar</a>
                                <button type="button" class="btn btn-danger" style="padding: 0;">
                                    <form action="{{ route('alumnos.destroy', [$alumno->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar">
                                    </form>
                                </button>
                              </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            No hay alumnos registrados
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Declaracion de Variables
    const inputMetodoBusqueda = document.querySelector('#metodoBusqueda');
    const menuSeleccion = document.querySelector('#menuBusqueda');
    // Establecer por defecto
    establecerMetodoBusquedaPorDefecto();
    // Agregar evento de click para cambiar metodo de busqueda
    menuSeleccion.addEventListener('click', function(e) {
        if(e.target.nodeName === 'SPAN') {
            const previousElementoSeleccionado = menuSeleccion.querySelector('.active')
            previousElementoSeleccionado.classList.remove('active')
            const elementoSeleccionado = e.target;
            elementoSeleccionado.classList.add('active')
            const metodoBusquedaSeleccionado = elementoSeleccionado.dataset.tipobusqueda;
            inputMetodoBusqueda.value = metodoBusquedaSeleccionado;
        }
    })

    function establecerMetodoBusquedaPorDefecto() {
        if(inputMetodoBusqueda.value === '') {
            inputMetodoBusqueda.value = 'nombres';
            const itemMetodoBusqueda = menuSeleccion.querySelector('[data-tipoBusqueda="nombres"]');
            itemMetodoBusqueda.classList.add('active');
            return;
        }
    }
</script>
@endsection