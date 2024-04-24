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
        <h1 class="text-uppercase fs-1 text-center">Lista de Instructores</h1>
        <div class="d-sm-flex justify-content-sm-between">
            <a href="{{ route('instructores.create') }}" class="mb-2 btn btn-dark opacity-75">Registrar Instructor</a>
            <form action="{{ route('instructores.index') }}" method="GET" class="input-group" style="max-width: 300px">
                <input value="{{ request()->input('parametro') ?? '' }}" id="parametro" name="parametro" type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <input type="hidden" value="{{ request()->input('metodoBusqueda') ?? '' }}" id="metodoBusqueda" name="metodoBusqueda">
                <ul id="menuBusqueda" class="dropdown-menu dropdown-menu-end">
                    <li><span data-tipoBusqueda="dni" class="dropdown-item {{ request()->input('metodoBusqueda') == 'dni' ? 'active':'' }}">Dni</span></li>
                    <li><span data-tipoBusqueda="nombres" class="dropdown-item {{ request()->input('metodoBusqueda') == 'nombres' ? 'active':'' }}">Nombres</span></li>
                    <li><span data-tipoBusqueda="apellidos" class="dropdown-item {{ request()->input('metodoBusqueda') == 'apellidos' ? 'active':'' }}">Apellidos</span></li>
                    <li><span data-tipoBusqueda="profesion" class="dropdown-item {{ request()->input('metodoBusqueda') == 'profesion' ? 'active':'' }}">Profesion</span></li>
                </ul>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered border-danger caption-top" style="">
                <caption>
                    Tabla de Instructores
                </caption>
                <thead>
                    <tr class="table-dark">
                        <th>ID</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Profesión</th>
                        <th>Celular</th>
                        <th>Salario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-warning">
                @forelse($instructores as $instructor)
                    <tr>
                        <td>{{ $instructor->id }}</td>
                        <td>{{ $instructor->dni }}</td>
                        <td>{{ $instructor->nombres }}</td>
                        <td>{{ $instructor->apellidos }}</td>
                        <td>{{ $instructor->profesion }}</td>
                        <td>{{ $instructor->celular }}</td>
                        <td>{{ $instructor->salario }}</td>
                        <td style="">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a class="btn btn-warning" href="{{ route('instructores.edit', [$instructor->id]) }}" style="text-decoration: none; font-weight: 700; color: black;">Editar</a>
                                <button type="button" class="btn btn-danger" style="padding: 0;">
                                    <form action="{{ route('instructores.destroy', [$instructor->id]) }}" method="POST" style="display: inline;">
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
                        <td colspan="8" class="text-center">No hay instrucores registrados</td>
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